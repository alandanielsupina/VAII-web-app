import './bootstrap';

import Alpine from 'alpinejs';

//pre jQuery:
import jQuery from 'jquery';

window.Alpine = Alpine;

//pre jQuery:
window.$ = jQuery;

Alpine.start();

var currentPage = 1;
var backToFirstPage = document.getElementById("backToFirstPage");
var loadLessButton = document.getElementById("loadLessButton");
var loadMoreButton = document.getElementById("loadMoreButton");
var viewPaginationNumber = document.getElementById("servicesPaginationNumber");
var servicesContainer = document.getElementById("servicesContainer");

//funkcia na vytvorenie view pre jednu službu
function createServiceLink(service) {
    var serviceWithoutSpaces = service.city_name.replace(/ /g, '');
    var link = document.createElement("a");
    link.href = "/new_services/edit/" + service.id;
    link.className = "service-link " + serviceWithoutSpaces;

    var firmDiv = document.createElement("div");
    firmDiv.className = "one-firm mb-4";

    var containerDiv = document.createElement("div");
    containerDiv.className = "container-one-firm-card";

    var flexDiv = document.createElement("div");
    flexDiv.className = "flex";

    var leftDiv = document.createElement("div");
    leftDiv.className = "w-1/4 lg:ml-10";
    var leftHeader = document.createElement("h4");
    leftHeader.textContent = service.name;
    leftDiv.appendChild(leftHeader);

    var rightDiv = document.createElement("div");
    rightDiv.className = "w-3/4 lg:mr-10 flex flex-col text-right";
    var rightHeader1 = document.createElement("h4");
    rightHeader1.textContent = service.company_name;
    var rightHeader2 = document.createElement("h6");
    rightHeader2.className = "text-lg";
    rightHeader2.textContent = service.city_name;
    rightDiv.appendChild(rightHeader1);
    rightDiv.appendChild(rightHeader2);

    flexDiv.appendChild(leftDiv);
    flexDiv.appendChild(rightDiv);

    containerDiv.appendChild(flexDiv);
    firmDiv.appendChild(containerDiv);
    link.appendChild(firmDiv);

    return link;
}

//Funkcia na získanie údajov pre prvú stránku
function loadInitialPage() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/new_services/page/" + currentPage, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText === "[]") {
                alert("Žiadne záznamy");
            } else {
                var response = JSON.parse(xhr.responseText);
                response.forEach(function (service) {
                    // var serviceElement = document.createElement("div");
                    // serviceElement.textContent = service.company_name;
                    // servicesContainer.appendChild(serviceElement);



                var serviceLink = createServiceLink(service);
                servicesContainer.appendChild(serviceLink);  
                });
            }
        } else if (xhr.readyState == 4 && xhr.status != 200) {
            alert("Chyba pri načítaní dát");
        }
    };
    xhr.send();
}

// Načítanie prvotnej stránky pri načítaní dokumentu
loadInitialPage();

backToFirstPage.addEventListener("click", function () {
    currentPage = 1;
    viewPaginationNumber.innerHTML = currentPage;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/new_services/page/" + currentPage, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            servicesContainer.innerHTML = "";
            viewPaginationNumber.innerHTML = currentPage;
            var response = JSON.parse(xhr.responseText);
            response.forEach(function (service) {
                // var serviceElement = document.createElement("div");
                // serviceElement.textContent = service.company_name;
                // servicesContainer.appendChild(serviceElement);

                var serviceLink = createServiceLink(service);
                servicesContainer.appendChild(serviceLink); 
            });
        } else if (xhr.readyState == 4 && xhr.status != 200) {
            alert("Chyba pri načítaní dát");
        }
    };
    xhr.send();
});

loadLessButton.addEventListener("click", function () {
    currentPage--;
    if (currentPage === 0) {
        currentPage++;
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/new_services/page/" + currentPage, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === "[]") {
                    alert("Už nie je viacej stránok");
                    currentPage++;
                } else {
                    servicesContainer.innerHTML = "";
                    viewPaginationNumber.innerHTML = currentPage;
                    var response = JSON.parse(xhr.responseText);
                    response.forEach(function (service) {
                        // var serviceElement = document.createElement("div");
                        // serviceElement.textContent = service.company_name;
                        // servicesContainer.appendChild(serviceElement);

                        var serviceLink = createServiceLink(service);
                        servicesContainer.appendChild(serviceLink); 
                    });
                }
            } else if (xhr.readyState == 4 && xhr.status != 200) {
                alert("Chyba pri načítaní dát");
            }
        };
        xhr.send();
    }
});

loadMoreButton.addEventListener("click", function () {
    currentPage++;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/new_services/page/" + currentPage, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText === "[]") {
                alert("Už nie je viacej stránok");
                currentPage--;
            } else {
                servicesContainer.innerHTML = "";
                viewPaginationNumber.innerHTML = currentPage;
                var response = JSON.parse(xhr.responseText);
                response.forEach(function (service) {
                    // var serviceElement = document.createElement("div");
                    // serviceElement.textContent = service.company_name;
                    // servicesContainer.appendChild(serviceElement);

                    var serviceLink = createServiceLink(service);
                    servicesContainer.appendChild(serviceLink); 
                });
            }
        } else if (xhr.readyState == 4 && xhr.status != 200) {
            alert("Chyba pri načítaní dát");
        }
    };
    xhr.send();
});
