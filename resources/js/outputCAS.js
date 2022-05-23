const submitButton = document.querySelector("#submitCommand");

submitButton.addEventListener("click", async () => {
    
    const outputDiv = document.querySelector("#outputDiv");

    console.log("HAAAAAAAAAAAAA");

    const inputCommand = document.querySelector("#inputCommand").value;
    console.log(inputCommand)

    let url = "/api/octave?apikey=aaaaaaaaaaaaaaaaaaaaaa";

    const request = new Request(url, {
        method: "POST",
        body: JSON.stringify({
            "query": inputCommand
        })
    });

    const respData = await fetch(request);
    const respJSON = await respData.json();

    console.log(respJSON)


    outputDiv.innerHTML = respJSON.success === "true" ? respJSON.data : respJSON.success;

});