function Ajax() {
    this.XHR = function() {
        if (XMLHttpRequest) {
            return new XMLHttpRequest();
        } else {
            throw new Error('XHR не поддерживается');
        }
    };
    this.request = function(_data, _options) {
        const $R = this.XHR();
        let data = _data || {},
            options = {
                method: 'POST',
                headers: [
                    [
                        'Content-Type',
                        'application/json; charset=utf-8',
                    ],
                    [
                        'x-authorization-token',
                        '5a9a56c1d6bceaa9e6c2cde5fca94e8a996b6469',
                    ],
                ],
                url: null,
                async: true,
                success: function() {
                },
                error: function() {
                },
            };

        let encodedData = JSON.stringify(data);

        if (_options) {
            for (let i in _options) {
                options[i] = _options[i];
            }
        }

        if (options.url === null) {
            throw new Error('Не залан url назначения');
        }

        $R.open(options.method, options.url, options.async);
        $R.onreadystatechange = function() {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    if (this.responseText === '') throw new Error('Ответ пустой');
                    options.success(this.responseText);
                } else {
                    options.error(this.responseText);
                    switch (this.status) {
                        case 404:
                            throw new Error('Страница не найдена');
                        case 0:
                            throw new Error('Нет соединения с сервером');
                        default:
                            throw new Error(`Неизвестная ошибка (${$R.status}})`);
                    }
                }
            }
        };
        for (let i = 0; i < options.headers.length; i++) {
            let $i = options.headers[i];
            $R.setRequestHeader($i[0], $i[1]);
        }
        $R.send(encodedData);
    };
}