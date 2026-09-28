/*
 * Qantis - mobiel menu
 */
(function () {
    'use strict';

    var header = document.querySelector('.site-header');
    var toggle = document.querySelector('.nav-toggle');
    var nav    = document.getElementById('site-navigation');

    if (!header || !toggle || !nav) {
        return;
    }

    var mq = window.matchMedia('(max-width: 900px)');

    function setOpen(open) {
        header.classList.toggle('nav-open', open);
        document.body.classList.toggle('nav-locked', open);
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        toggle.setAttribute('aria-label', open ? 'Menu sluiten' : 'Menu openen');
    }

    toggle.addEventListener('click', function () {
        setOpen(!header.classList.contains('nav-open'));
    });

    nav.addEventListener('click', function (e) {
        if (e.target.closest('a')) {
            setOpen(false);
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && header.classList.contains('nav-open')) {
            setOpen(false);
            toggle.focus();
        }
    });

    var onChange = function (e) {
        if (!e.matches) {
            setOpen(false);
        }
    };
    if (mq.addEventListener) {
        mq.addEventListener('change', onChange);
    } else if (mq.addListener) {
        mq.addListener(onChange);
    }
})();
