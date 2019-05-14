function getDefaultSettlements() {
    let data = {
        'id': 'JsonRpcClient.js',
        'jsonrpc': '2.0',
        'method': 'getSettlements',
        'params': {
            'per_page': 10,
            'page': 1,
            'types': [
                'Город',
            ],
            'level': 2,
            'parent': '36000000000',
            'country_code': 'RU',
        },
    };
    let $ajax = new Ajax();
    $ajax.request(data, {
        url: 'https://api.shiptor.ru/public/v1',
        success: function(response) {
            const responseObject = JSON.parse(response);
            console.log(responseObject);
            createSettlementsDropdawn(responseObject);
        },
    });
};

function getSettlementsBySearchString() {
    const settlementsSearchInput = window.document.querySelector('#settlements_search_input');

    if (settlementsSearchInput.value === '') {
        return;
    }

    let data = {
        'id': 'JsonRpcClient.js',
        'jsonrpc': '2.0',
        'method': 'suggestSettlement',
        'params': {
            'query': settlementsSearchInput.value,
            //"parent": "36000000000",
            'country_code': 'RU',
        },
    };

    let $ajax = new Ajax();
    $ajax.request(data, {
        url: 'https://api.shiptor.ru/public/v1',
        success: function(response) {
            const responseObject = JSON.parse(response);
            console.log(responseObject);
            createSettlementsDropdawnFromSearch(responseObject);
        },
    });
};

function getShippingByKladrId() {
    if (this.value === 0) {
        return;
    }

    const section = window.document.querySelector('#shipping');
    section.style.display = 'block';

    let data = {
        'id': 'JsonRpcClient.js',
        'jsonrpc': '2.0',
        'method': 'calculateShipping',
        'params': {
            'length': 20,
            'width': 10,
            'height': 20,
            'weight': 1.5,
            'cod': 10,
            'declared_cost': 10,
            'kladr_id': this.value,
            // "courier": "dpd"
        },
    };

    let $ajax = new Ajax();
    $ajax.request(data, {
        url: 'https://api.shiptor.ru/public/v1',
        success: function(response) {
            const responseObject = JSON.parse(response);
            console.log(responseObject);
            createShippingDropdawn(responseObject);
        },
    });
};