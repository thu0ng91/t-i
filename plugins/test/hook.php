<?php
function testHook(FWHookEvent $evt) {
    var_dump($evt->sender);

}
FWHook::install('book', 'create', 'testHook');