'use strict';

function insertData(data) {
    const countPalsBlock = document.querySelector('p.count-pal'),
        palsListBlock = document.querySelector('div.pals-list'),
        countPals = data['count'],
        palsList = data['pals'];

    countPalsBlock.innerText = '';
    palsListBlock.innerText = '';
    countPalsBlock.classList.add('active');

    if(countPals === 0){
        countPalsBlock.innerText = 'Не найдено ни одного палиндрома.';
    } else {
        countPalsBlock.innerHTML = `Найдено палиндромов: <span class="number">${countPals}</span>`;

        // Создаем список и в цикле вставляем палиндромы

        let listItem = document.createElement('ol');

        palsList.forEach(pal => {
            let palListItem = document.createElement('li');
            palListItem.innerText = pal;
            listItem.appendChild(palListItem);
        });

        palsListBlock.appendChild(listItem);
    }
}

function getData(e) {
    e.preventDefault();

    // Получаем данные формы и отправляем обработчику

    const dataForm = new FormData(e.target),
        options = {
            method: 'POST',
            body: dataForm
        };

    fetch('/test_app/handler.php', options)
        .then(resp => {
            if(resp.ok){
                return resp.json();
            } else {
                alert(`Ошибка HTTP: ${resp.status}`);
            }
        })
        .then(resp => insertData(resp))
        .catch(error => {
            alert(error);
        })
}

const form = document.querySelector('form.palindrome');
form.addEventListener('submit', getData);