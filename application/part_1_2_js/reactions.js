function createSettlementsDropdawn(response) {
    const dropdawn = window.document.querySelector('#settlements_list'),
        settlements = response.result.settlements;

    if (settlements.length > 0) {
        let fragment = window.document.createDocumentFragment(),
            option = window.document.createElement('OPTION');

        option.innerHTML = 'Выберете город';
        option.value = 0;
        fragment.appendChild(option);

        for (let i = 0; i < settlements.length; i++) {
            let $i = settlements[i],
                option = window.document.createElement('OPTION');
            option.innerHTML = $i.name;
            option.value = $i.kladr_id;
            fragment.appendChild(option);
        }
        dropdawn.appendChild(fragment);
    } else {
        let option = window.document.createElement('OPTION');
        option.innerHTML = 'Ничего не найдено';
        option.value = 0;
        dropdawn.appendChild(option);
    }
}

function createSettlementsDropdawnFromSearch(response) {
    const dropdawn = window.document.querySelector('#settlements_list'),
        settlements = response.result;

    dropdawn.innerHTML = '';
    if (settlements.length > 0) {
        let fragment = window.document.createDocumentFragment(),
            option = window.document.createElement('OPTION');

        option.innerHTML = 'Выберете город';
        option.value = 0;
        fragment.appendChild(option);

        for (let i = 0; i < settlements.length; i++) {
            let $i = settlements[i],
                option = window.document.createElement('OPTION');
            option.innerHTML = $i.short_readable;
            option.value = $i.kladr_id;
            fragment.appendChild(option);
        }
        dropdawn.appendChild(fragment);
    } else {
        let option = window.document.createElement('OPTION');
        option.innerHTML = 'Ничего не найдено';
        option.value = 0;
        dropdawn.appendChild(option);
    }
}

function createShippingDropdawn(response) {
    const dropdawn = window.document.querySelector('#shipping_list'),
        shippings = response.result.methods;

    dropdawn.innerHTML = '';
    if (shippings.length > 0) {
        let fragment = window.document.createDocumentFragment(),
            option = window.document.createElement('OPTION');

        option.innerHTML = 'Выберете доставку';
        option.value = 0;
        fragment.appendChild(option);

        for (let i = 0; i < shippings.length; i++) {
            let $i = shippings[i],
                option = window.document.createElement('OPTION');
            option.innerHTML = `${$i.cost.total.readable}, ${$i.days}, ${$i.method.name}`;
            option.value = $i.method.id;
            fragment.appendChild(option);
        }
        dropdawn.appendChild(fragment);
    } else {
        let option = window.document.createElement('OPTION');
        option.innerHTML = 'Ничего не найдено';
        option.value = 0;
        dropdawn.appendChild(option);
    }
}