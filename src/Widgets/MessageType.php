<?php

namespace Tungnt\Admin\Message\Widgets;

use Tungnt\Admin\Admin;
use Tungnt\Admin\Grid\Tools\AbstractTool;
use Illuminate\Support\Facades\Request;

class MessageType extends AbstractTool
{
    public function script()
    {
        $url = Request::fullUrlWithQuery(['type' => '_type_']);

        return <<<EOT

$('input:radio.message-type').change(function () {

    var url = "$url".replace('_type_', $(this).val());

    $.pjax({container:'#pjax-container', url: url });

});

EOT;
    }

    public function render()
    {
        Admin::script($this->script());

        $options = [
            'inbox'   => 'Inbox',
            'outbox'  => 'Outbox',
        ];

        return view('laravel-admin-message::list-type', compact('options'));
    }
}
