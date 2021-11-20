<?php

if (apcu_enabled()) {
    // visit count が存在しているかチェック
    if (!apcu_fetch('visit_count')) {
        // 存在していないばあい, １を代入する
        apcu_store('visit_count', 1);
    } else {
        // 存在している場合、１を足す
        apcu_inc('visit_count');
    }
    // 取得
    $visits = apcu_fetch('visit_count');
    echo "You visited " , $visits, " times";
}