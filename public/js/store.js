
    let categories = []

    items = document.querySelectorAll('input[name="categories[]"]')
    items.forEach(item => {
        item.addEventListener('change', function (e) {
            e.preventDefault()
            categories = []
            checkedItems = document.querySelectorAll('input[name="categories[]"]:checked')
            checkedItems.forEach(itemCheck => {
                categories.push(itemCheck.value);
            })

            let xhr = new XMLHttpRequest()

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log('ok')

                    }
                }
            }

            xhr.open('GET', '/filter', true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.send(categories)

        })
    })




