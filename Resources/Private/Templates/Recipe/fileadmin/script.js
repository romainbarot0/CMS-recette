window.addEventListener('load', event => {
    const elements = document.getElementsByClassName("text-etapes");
    console.log(elements);
    for (let item in elements){
        console.log(item);
        item.textContent = removeTags(item.textContent);
    }
});

function removeTags(str) {
    if ((str===null) || (str===''))
        return false;
    else
        str = str.toString();

    // Regular expression to identify HTML tags in
    // the input string. Replacing the identified
    // HTML tag with a null string.
    return str.replace( /(<([^>]+)>)/ig, '');
}
