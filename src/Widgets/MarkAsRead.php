<?php

namespace Tungnt\Admin\Message\Widgets;

use Tungnt\Admin\Grid\Tools\BatchAction;

class MarkAsRead extends BatchAction
{
    public function script()
    {
        return <<<EOT

$('{$this->getElementClass()}').on('click', function() {

    $.ajax({
        method: 'put',
        url: '{$this->resource}/'+selectedRows().join(','),
        data: {
            _token:LA.token,
        },
        success: function (data) {
            $.pjax.reload('#pjax-container');
            toastr.success(data.message);
        }
    });
});

EOT;
    }
}
