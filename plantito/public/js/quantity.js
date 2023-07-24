$(document).ready(function () {
    $(".deduct_button").click(function () {
        $pid = $(this).attr("id");
        $new_val = Number($("input.order_" + $pid).val()) - 1;
        if ($new_val >= 0) {
            $("input.order_" + $pid).val($new_val);
        }
    });

    $(".add_button").click(function () {
        $pid = $(this).attr("id");
        $new_val = Number($("input.order_" + $pid).val()) + 1;
        if ($new_val < 99) {
            $("input.order_" + $pid).val($new_val);
        }
    });
});
