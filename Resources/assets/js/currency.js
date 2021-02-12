import AutoNumeric from 'autonumeric';

if ($('.currency').length) {
    new AutoNumeric.multiple('.currency', {
        decimalPlacesRawValue: 6,
        decimalPlacesShownOnBlur: 2,
        decimalPlacesShownOnFocus: 4,
        emptyInputBehavior: 'zero',
        unformatOnSubmit: true
    });
}
