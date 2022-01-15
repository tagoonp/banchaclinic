let server_stage = 'local'
// let server_stage = 'server'

var authen_api = 'http://localhost:8888/banchaclinic/application/api/'
var authen_controller = 'http://localhost:8888/banchaclinic/application/controller/'

if(server_stage != 'local'){
    authen_api = 'https://banchaclinic.wisnior.com/application/api/'
    authen_controller = 'https://banchaclinic.wisnior.com/application/controller/'
}

// let authen_api = 'https://banchaclinic.wisnior.com/application/api/'
// let authen_controller = 'https://banchaclinic.wisnior.com/application/controller/'

let inv_authen_api = 'https://banchaclinic.wisnior.com/application/api/'
let inv_authen_controller = 'https://banchaclinic.wisnior.com/application/controller/'


function toggleFullscreen(elem) {
    
}

