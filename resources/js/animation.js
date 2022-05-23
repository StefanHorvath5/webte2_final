const animationDiv = document.querySelector("#animationDiv");

let r = null;
setInterval(async () => {
    let url = "/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa";
    if (r !== null) {
        url = `/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa&query=${r}`;
    }
    const request = new Request(url, {
        method: "GET",
    });
    const respData = await fetch(request);
    const respJSON = await respData.json();

    console.log(respJSON);
    animationDiv.innerHTML = "r: " + respJSON.r;
    r = respJSON.r;
}, 1000);
