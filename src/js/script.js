dropdowns()

function dropdowns() {
    let dropdowns = document.querySelectorAll('.dropdown')

    if(dropdowns) {
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', (e)=> {
                let dropdownList = dropdown.querySelector('.dropdown-list')
                let currentHeight = dropdownList.scrollHeight

                dropdowns.forEach(dr => {

                    if(dr !== dropdown && !dropdown.classList.contains('active')) {
                        dr.classList.remove('active')
                        if(dr.children[1]){
                            dr.children[1].style.height = '0px'
                            setTimeout(()=> {
                                dr.children[1].style.display = 'none'
                            }, 250)
                        }
                    }
                })

                if(!dropdown.classList.contains('active')) {
                    dropdownList.style.display = 'flex'
                    currentHeight = dropdownList.scrollHeight
                    setTimeout(()=> {
                        dropdownList.style.height =currentHeight + 'px'
                        dropdown.classList.add('active')
                    },50)

                }else if(dropdown.classList.contains('active')) {
                    dropdown.classList.remove('active')
                    dropdownList.style.height = '0px'
                    setTimeout(()=> {
                        dropdownList.style.display = 'none'
                    }, 250)
                }

            })
        })
        document.addEventListener('click', (e)=> {
            if(!e.target.closest('.dropdown')) {
                dropdowns.forEach(dropdown => {
                    if(!dropdown.classList.contains('navbar-item')) {
                        let dropdownListes = dropdown.querySelectorAll('.dropdown-list')
                        dropdownListes.forEach(list => {
                            list.style.height = '0px'
                        })
                        setTimeout(()=> {
                            dropdown.classList.remove('active')
                        }, 150)
                    }
                })
            }
        })
    }
}

window.onload = ()=> {
    let dropdowns = document.querySelectorAll('.dropdown')
    
    dropdowns.forEach(dropdown => {
        let dropdownList = dropdown.querySelector('.dropdown-list')
        let dropdownListLink = dropdown.querySelectorAll('.dropdown-list .dropdown-link')
        dropdownListLink.forEach(link => {
            if(link.classList.contains('active')) {
                dropdownList.style.display = 'flex'
                currentHeight = dropdownList.scrollHeight
                setTimeout(()=> {
                    dropdownList.style.height = currentHeight + 'px'
                    dropdown.classList.add('active')
                },150)
            }
        })
    })
}