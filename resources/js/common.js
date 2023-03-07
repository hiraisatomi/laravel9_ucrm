// jsで改行指定(自作する必要がある)
const nl2br = (str) => {
    var res = str.replace(/\r\n/g, '<br>');
    res = res.replace(/(\n|\r)/g, "<br>");
    return res;
}

// 購入日の設定
const getToday = () => {
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = ("0"+(today.getMonth()+1)).slice(-2);
    const dd = ("0"+today.getDate()).slice(-2);

    return yyyy+'-'+mm+'-'+dd;
}

export { nl2br }
export { getToday }

