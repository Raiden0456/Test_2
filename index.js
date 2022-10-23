//Получение и вывод всех элементов с data-id//
const data_id_elem = document.querySelectorAll('[data-id]');
console.log(data_id_elem);
//Сортировка квадратов по высоте//
$('div.class').sort( function(a,b) {
    return $(b).height() - $(a).height();
 }).appendTo('div.parent');