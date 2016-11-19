var status = 1;

function del_confirm(name){
	return confirm('Are you sure to delete data "' + name + '"?');
}

function app_confirm(name){
	return confirm('Are you sure to approve data "' + name + '"?');
}

function multi_del_confirm(sender){
	var num 	= sender.elements.length;
	var checked = false;
	
	for (i = 1; i < num; i++) {
		if (sender.elements[i].checked) {
			checked = true;
			break;
		}
	}
	
	if (checked == false) return false;
	return confirm('Are you sure you want to delete the selected data?');
}

function multi_del_submit(){
	var form	= document.getElementById('grid');
	var go		= multi_del_confirm(form);
	
	if (go) form.submit();
	status = 0;
}

// str example: 1.000.000
function numToFloat(str){
	if (str == "") return '';

	// replace all dot to blank
	str = str.replace(/\./g, "");
	
	// replace all comma to dot
	str = str.replace(/\,/g, ".");
	
	// str to int
	return parseFloat(str);
}

// output example: 1.000.000
function floatToNum(num){
	var parts = num.toString().split(".");
	parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

// str example: 1.000.000
function currencytonum(str){
	if (str == "") return 0;

	// replace all dot to blank
	str = str.replace(/\,/g, "");
	
	// str to int
	return parseFloat(str);
}

// output example: 1,000,000
function numtocurrency(num){
	num = num.toString().replace(/\$|\,/g, '');
	
	if (isNaN(num)) num = "0";
	
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num * 100 + 0.50000000001);
	cents = num % 100;
	num = Math.floor(num / 100).toString();
	
	if (cents == 0) cents = '';
	else if (cents < 10) cents = ".0" + cents;
	else cents = '.' + cents;
	
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
		num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
	
	return (((sign) ? '' : '-') + num + cents );
}

function currencynum(num){
	num = num.toString().replace(/\$|\,/g, '');
	
	if (isNaN(num)) num = "0";
	
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num * 100 + 0.50000000001);
	cents = num % 100;
	num = Math.floor(num / 100).toString();
	
	if (cents == 0) cents = '';
	else if (cents < 10) cents = ",0" + cents;
	else cents = ',' + cents;
	
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
		num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
	
	return (((sign) ? '' : '-') + num + cents );
}

function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

function addCommas(str) {
	var str = str.replace(/,/g,'')
    var parts = (str + "").split("."),
        main = parts[0],
        len = main.length,
        output = "",
        i = len - 1;

    while(i >= 0) {
        output = main.charAt(i) + output;
        if ((len - i) % 3 === 0 && i > 0) {
            output = "," + output;
        }
        --i;
    }
    if (parts.length > 1) {
        output += "." + parts[1];
    }
    return output;
}

function currency_commas(str) {
    var parts = (str + "").split("."),
        main = parts[0],
        len = main.length,
        output = "",
        i = len - 1;

    while(i >= 0) {
        output = main.charAt(i) + output;
        if ((len - i) % 3 === 0 && i > 0) {
            output = "," + output;
        }
        --i;
    }
    if (parts.length > 1) {
        output += "." + parts[1];
    }
    return output;
}

function number_key(e){
	var keyCode = e.keyCode || e.which; 

	if (
		keyCode == 8
		|| keyCode == 9
        || keyCode == 190
		|| (keyCode >= 48 && keyCode <= 57)
		|| (keyCode >= 96 && keyCode <= 105)
	) {
		// do nothing
	}
	else {
		e.preventDefault();
	}
}

$(document).ready(function() {
	
	$('[type=text]').attr('autocomplete', 'off');
	$('[type=password]').attr('autocomplete', 'off');
	
});