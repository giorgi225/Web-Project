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
    
    if(dropdowns) {
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
}

let showHidePassword = document.querySelectorAll('.showHide')

if(showHidePassword) {
    showHidePassword.forEach(opt => {
        opt.addEventListener('click', (e)=> {
            opt.classList.toggle('active')
            if(opt.classList.contains('active')) {
                opt.closest('.form-control').querySelector('input').type = 'text'
            }else if(!opt.classList.contains('active')) {
                opt.closest('.form-control').querySelector('input').type = 'password'
            }
        })
    })
}

let allInputs = document.querySelectorAll('input')
if(allInputs) {
    allInputs.forEach(input => {
        input.addEventListener('focus', ()=> {
            allInputs.forEach(input => {
                if(input.closest('.form-input')) {
                    input.closest('.form-input').classList.remove('active')
                }
            })
            if(input.closest('.form-input')) {
                input.closest('.form-input').classList.add('active')
            }
        })
    })
}

let allModuls = document.querySelectorAll('.modul')
if(allModuls) {
    allModuls.forEach(modul => {
        modul.addEventListener('click', ()=> {
            let modulId = modul.id
            if(modulId) {
                let currentModulCont = document.querySelector(`[data-modul=${modulId}]`)
                if(currentModulCont) {
                    currentModulCont.classList.add('active')
                }
            }
        })
    })
}

if(document.querySelector("#no")) {
    document.querySelector('#no').addEventListener('click', ()=> {
        let logoutModul = document.querySelector("[data-modul='logout']")
        logoutModul.classList.remove('active')
    })
}