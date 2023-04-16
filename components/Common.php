<?php
namespace app\components;

use app\models\Orders;
use app\models\Products;
use app\models\Users;

class Common {

    const LIMIT = 15;

    const SOCKET = 'tcp://127.0.0.1:3081';

    public static function send($type, $message, $user = null)
    {
        $instance = stream_socket_client(self::SOCKET);
        fwrite($instance, json_encode(['user' => $user, 'message' => $message, 'type' => $type])  . "\n");
    }

    public static function getPagination($countProducts, $page) {
        $offset = 1;
        if ($page > 1) {
            $offset = $page * self::LIMIT;
        }
        return [
            'count' => $countProducts,
            'countPages' => round($countProducts / self::LIMIT, 0),
            'limit' => self::LIMIT,
            'current' => $page,
            'offset' => $offset,
        ];
    }

    public static function renderPagination($total, $page = 1, $limit = self::LIMIT, $links = 5, $list_class = 'blog-pagination ptb-20') {
        $list_class = 'blog-pagination ptb-20';
        $last       = ceil( $total / $limit );

        $start      = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
        $end        = ( ( $page + $links ) < $last ) ? $page + $links : $last;

        $html       = '<ul class="' . $list_class . '">';

        $class      = ( $page == 1 ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a href="?limit=' . $limit . '&page=' . ( $page - 1 ) . '">&laquo;</a></li>';

        if ( $start > 1 ) {
            $html   .= '<li><a href="?limit=' . $limit . '&page=1">1</a></li>';
            $html   .= '<li class="disabled"><span>...</span></li>';
        }

        for ( $i = $start ; $i <= $end; $i++ ) {
            $class  = ( $page == $i ) ? "active" : "";
            $html   .= '<li class="' . $class . '"><a href="?limit=' . $limit . '&page=' . $i . '">' . $i . '</a></li>';
        }

        if ( $end < $last ) {
            $html   .= '<li class="disabled"><span>...</span></li>';
            $html   .= '<li><a href="?limit=' . $limit . '&page=' . $last . '">' . $last . '</a></li>';
        }

        $class      = ( $page == $last ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a href="?limit=' . $limit . '&page=' . ( $page + 1 ) . '">&raquo;</a></li>';

        $html       .= '</ul>';

        echo $html;
    }

    public static function countOrders() {
        return Orders::find()->where(['status' => [Orders::STATUS_CREATED, Orders::STATUS_IN_PROGRESS]])->count();
    }

    public static function countUsers() {
        return Users::find()->where(['role' => Users::ROLE_CLIENT])->count();
    }

    public static function countActiveProducts() {
        return Products::find()->where(['status' => 1])->count();
    }

    public static function countArchiveProducts() {
        return Products::find()->where(['status' => 0])->count();
    }

    public static function getLastRegistredUser() {
        $last = Users::find()->where(['role' => Users::ROLE_CLIENT])->orderBy('id ASC')->one();
        if ($last) {
            return date('d-m-Y H:i', $last->create_time);
        }
        return '-';
    }

}
?>