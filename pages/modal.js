window.addEventListener('DOMContentLoaded', function() { 

    //Data manipulation for adding plants and opening their showcase before adding
    let plantModal = document.querySelectorAll("#plant");

    plantModal.addEventListener("click",(e) => {
        let name;
        let picture;
        let lvl;
        let toxic;
        let calendarPeriod;
        let dimensions;
        let reqLight;
        let harvestTime;
        let waterPeriod;
        let cutPeriod;
        let turnoverPeriod;
        let fertilizePeriod;
        let goodNeighbour;
        let badNeighbour;
        let quantityRow;
        let quantityCol;

        
            this.window.location.href("/cropAbout.php");
           
        
    })

    //about page
    //listen for click on card
    
    let uvjetiPage = this.document.getElementById("uvijeti");
    uvjetiPage.addEventListener("click", (e) => {
        this.window.location.reload();
    })

    let zdravljePage = this.document.getElementById("zdravlje"); 
    zdravljePage.addEventListener("click", (e) => {
        this.document.querySelector("article").innerHTML = '';
        this.document.querySelector("article").innerHTML =
            '<h3>Lisne uši</h3>'
            '<p>Blitva ima veliku mogućnost prilagodbe tlu i klimi. Minimalna je temperatura klijanja 5 °C, a optimalna 16 - 24 °C. Pri nižim temperaturama 5 - 10 °C biljka sporo raste, a optimalna temperatura rasta je 16 - 20 °C. I mlada i potpuno razvijena biljka može podnijeti blage mrazove.</p>';
        
    })






});