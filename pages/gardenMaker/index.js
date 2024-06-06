//wait DOM loaded to prevent error "addEventListener" from null
window.addEventListener('DOMContentLoaded', function() {
//init of variables


let name;
let desc;
let place;
let layout;
let light;






let gardenForm = document.getElementById("gardenForm");
//form data for first step
gardenForm.addEventListener("submit", (e) => {
    
    name == document.getElementById("name").value;
    desc = document.getElementById("desc").value;
    place = document.querySelector('input[name="mjesto"]:checked').id;
    
    function chgAction( place ) {
        if ( place=="balkon" ) {
            document.gardenForm.action = "secondBalkon.php";
        }
        else if ( place=="dvoriste" ) {
            document.gardenForm.action = "secondDvoriste0.php";
        }
        else if ( place=="polje" ) {
            document.gardenForm.action = "secondPolje.php";
        }
    }
    chgAction( place );
    
    //console.log(garden);
});
if (window.location.href.indexOf("second") > -1) {
    console.log(name, desc, place, layout, light);

    let layoutForm = document.getElementById("layoutForm");
    //form data for second step
    layoutForm.addEventListener("submit", (e) => {
        layout = document.querySelector('input[name="layout"]:checked').id;
        //console.log(garden);

        function chgAction( place ) {
        if ( place=="Dvoriste0" ) {
            document.gardenForm.action = "secondDvoriste1.php";
        }
    };
    chgAction( place );
    });

    

};
  
if (window.location.href.indexOf("third") > -1) {
    console.log(name, desc, place, layout, light);

    let lightForm = document.getElementById("lightForm");
    //form data for third step
    lightForm.addEventListener("submit", (e) => {
        light = document.querySelector('input[name="light"]:checked').id;
        //console.log(garden);
    });
}

var garden = {
    name: name,
    desc: desc,
    place: place,
    layout: layout,
    light: light,
};

//console.log(garden);
console.log(name, desc, place, layout, light);



  
if (window.location.href.indexOf("home") > -1) {
    console.log(name, desc, place, layout, light);
}


});