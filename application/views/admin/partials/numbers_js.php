<script src="https://unpkg.com/currency.js@2.0.4/dist/currency.min.js" type="text/javascript"></script>

<script>
    function formatCurrencyJs(type = null, number = '0', this_precision = 0) {
        if (type == 'IDR') {
            result = currency(number, { symbol: 'Rp ', separator: ',', precision: this_precision }).format()
        } else if(type == 'USD') {
            result = currency(number, { symbol: '$ ', separator: '', precision: this_precision }).format()
        } else {
            result = currency(number, { symbol: '', separator: ',', precision: this_precision }).format()
        }

        return result;
    }

    function formatNumberJs(value) {
        var number_only = value.replace(/,/g, ''); // -100000.00
        var number_decimal = number_only.split('.'); // [-100000, 00]

        number_first = number_decimal[0]; // -100000

        // before point -> positive
        number_0 = number_first.replace(/[^,\d]/g, ''); // 100000

        // before point -> formatting
        number_formatted_0 = formatCurrencyJs('USD', number_0);

        // before point -> negative
        if (number_first.includes('-') && number_0 == 0) {
            number_formatted_0 = '-0';
        }

        if (number_first.includes('-') && number_0 > 0) {
            number_formatted_0 = '-' + number_formatted_0;
        }

        number_final = number_formatted_0;

        // after point
        number_second = number_decimal[1];
        if (number_second != '' && number_second != null) {
            number_final = number_formatted_0 + '.' + number_second;
        }
        if (number_second == '') {
            number_final = number_formatted_0 + '.';
        }

        return number_final;
    }

    function onFormatNumberJs(this_element) {
        var number_final = formatNumberJs(this_element.val());

        // show in view
        this_element.val(number_final);

        // for request to database
        var id_input_real = this_element.attr("data-id_input_real");
        var number_real = number_final.replace(/,/g, '');
		number_real = number_real.replace(/\$ /g, '');
        $("#" + id_input_real).val(number_real);
    }

    $(document).on('change', '.format-number', function() {
        onFormatNumberJs($(this));
    });
    $(document).on('keyup', '.format-number', function() {
        onFormatNumberJs($(this));
    });
</script>
