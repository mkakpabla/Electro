
const get = function (url, success, fail) {
    let xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                success(xhr)
            } else {
                fail(xhr)
            }
        }
    }
    xhr.open('GET', url, true)
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    xhr.send()
}

const post = function (url, data,  success, fail) {
    let xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                success(xhr)
            } else {
                fail(xhr)
            }
        }
    }
    xhr.open('POST', url, true)
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    xhr.send(data)
}

let select = function(selectors) {
    return document.querySelector(selectors)
}
let selects = function(selectors) {
    return document.querySelectorAll(selectors)
}