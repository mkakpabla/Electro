/**
 * Permet de faire de requetes ajax en post
 * @param url
 * @param data
 * @returns {Promise<post>}
 */
function  post(url, data) {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest()
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    resolve(xhr)
                } else {
                    reject(xhr)
                }
            }
        }
        xhr.open('POST', url, true)
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
        xhr.send(data)
    })
}

/**
 * Permet de faire des requetes ajax en get
 * @param url
 * @returns {Promise<get>}
 */
function get(url) {
    return new Promise(((resolve, reject) => {
        let xhr = new XMLHttpRequest()
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    resolve(xhr)
                } else {
                    reject(xhr)
                }
            }
        }
        xhr.open('GET', url, true)
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
        xhr.send()
    }))
}
