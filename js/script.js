'use strict';

window.addEventListener('DOMContentLoaded', function () {

    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.menu');
    const closeElem = document.querySelector('.menu__close');
    const menuLinks = document.querySelectorAll('.menu__link')


    hamburger.addEventListener('click', () => {
        menu.classList.add('active');

    });

    closeElem.addEventListener('click', () => {
        menu.classList.remove('active');
    });


    menuLinks.forEach(item => {
        item.addEventListener('click', () => {
            menu.classList.remove('active');
        });
    });


    const counters = document.querySelectorAll('.percent__item-percent'),
        lines = document.querySelectorAll('.percent__item-line-main');

    counters.forEach((item, i) => {
        lines[i].style.width = item.innerHTML;
    });

    // FORM

    const form = document.querySelector('form');
    const name = document.querySelector('#name');
    const email = document.querySelector('#email');
    const textarea = document.querySelector('#text');
    const checkBox = document.querySelector('input[type = checkbox]');


    form.addEventListener('submit', formSend);

    async function formSend(e) {
        e.preventDefault();

        if (name.validity.valid && email.validity.valid && textarea.validity.valid && checkBox.checked) {
            form.classList.add('sending');

            let formData = new FormData(form);

            let response = await fetch('/mailer/smart.php', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                let result = await response;
                form.reset();
                form.classList.remove('sending');

            } else {
                alert('Ошибка отправки');
                form.classList.remove('sending');
            }
        }
    }

    const anchors = document.querySelectorAll('a[href*="#"]');

    for (let anchor of anchors) {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const blockID = anchor.getAttribute('href').substr(1);

            document.getElementById(blockID).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    }
});