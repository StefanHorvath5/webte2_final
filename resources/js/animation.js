const animationDiv = document.querySelector("#animationDiv");
let graf = document.querySelector("#simulaciaGraf");

// let r = null;
// setInterval(async () => {
//     let url = "/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa";
//     if (r !== null) {
//         url = `/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa&query=${r}`;
//     }
//     const request = new Request(url, {
//         method: "GET",
//     });
//     const respData = await fetch(request);
//     const respJSON = await respData.json();

//     console.log(respJSON);
//     animationDiv.innerHTML = "r: " + respJSON.r;
//     r = respJSON.r;
// }, 1000);

let trace1 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgba(253,96,178,1)",
        width: 3,
    },
    name: "Sinus",
};

let trace2 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(76,226,245,1)",
        width: 3,
    },
    name: "Cosinus",
};

let trace3 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(76,169,250)",
        width: 3,
    },
    name: "Cosinus",
};

let trace4 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(163,76,245)",
        width: 3,
    },
    name: "Cosinus",
};

let r = null;

let data1 = [];
let data2 = [];
// setInterval(async () => {
//     data1 = [];
//     data2 = [];
//     let url = "/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa";
//     if (r !== null) {
//         url = `/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa&query=${r}`;
//     }
//     const request = new Request(url, {
//         method: "GET",
//     });
//     const respData = await fetch(request);
//     const respJSON = await respData.json();
//     data1.push(respJSON.data.y);
//     data2.push(respJSON.data.x);

//     // console.log("data1 ");
//     // console.log("data2 ");
//     draw();
// }, 5000);

const draw = async () => {
    // let graph = [trace1, trace2, trace3, trace4];
    // Plotly.newPlot(graf, graph, { responsive: false });
    
    for (let i = 0; i < data1[0].length; i++) {
        trace1.y.push(data1[0][i]["x0"]);
        trace1.x.push(i);
    }
    for (let i = 0; i < data2[0].length; i++) {
        trace2.y.push(data2[0][i]["x3"]);
        trace2.x.push(i);

        trace3.y.push(data2[0][i]["x0"]);
        trace3.x.push(i);

        trace4.y.push(data2[0][i]["x1"]);
        trace4.x.push(i);
    }
    console.log(trace1);
    let graph = [trace1, trace2, trace3, trace4];
    Plotly.newPlot(graf, graph, { responsive: false });

    // var cnt = 0;

    // var interval = setInterval(function() {

    // Plotly.extendTraces(graf, {
    //     x: [trace1.x, trace2.x, trace3.x, trace4.x],
    //     y: [trace1.y, trace2.y, trace3.y, trace4.y]
    // }, [0, 1, 2, 3])

    // if(++cnt === 100) clearInterval(interval);
    // }, 300);

}

let font = "Arial";
let fontsize = 20;

let baselayer = new Konva.Stage({
    container: "simulationAnim", // id of container <div>
    width: 850,
    height: 400,
});
let animlayer = new Konva.Layer();
baselayer.add(animlayer);

function drawRect(xpos, ypos, text) {
    var group = new Konva.Group({
        draggable: false,
    });
    let NewRect = new Konva.Rect({
        x: xpos,
        y: ypos,
        width: 70,
        height: 100,
        fill: "rgb(0,100,0)",
        stroke: "rgb(0,0,0)",
        strokeWidth: 4,
        lineJoin: "round",
    });
    group.add(NewRect);

    let NewText = new Konva.Text({
        x: xpos,
        y: ypos,
        width: 70,
        height: 100,
        align: "center",
        verticalAlign: "middle",
        text: text,
        fontSize: fontsize,
        fontFamily: font,
        fill: "rgb(255,255,255)",
    });
    group.add(NewText);
    animlayer.add(group);
    return group;
}

var rect1 = drawRect(200, 50, "m1");
var rect2 = drawRect(470, 50, "m2");

var imageObj = new Image();
var image;
var image2;
const animationButton = document.querySelector("#animationButton");
imageObj.onload = function () {
    image = new Konva.Image({
        x: 0,
        y: 85,
        image: imageObj,
        width: 200,
        height: 75,
    });
    animlayer.add(image);

    image2 = new Konva.Image({
        x: 270,
        y: 85,
        image: imageObj,
        width: 200,
        height: 75,
    });
    animlayer.add(image);
    animlayer.add(image2);

    let anim = new Konva.Animation(function (frame) {});
    let animI = 0;
    animationButton.addEventListener("click", async () => {
        
        // get graph
        // get point
        // Plotly.restyle
                
        anim.stop();
        data1 = [];
        data2 = [];
        let url = "/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa";
        // if (animI === 1) {
        //     url = `/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa&iteration='1'`;
        // }
        const request = new Request(url, {
            method: "GET",
        });
        const respData = await fetch(request);
        const respJSON = await respData.json();
        data1.push(respJSON.data.y);
        data2.push(respJSON.data.x);
        console.log(data2[0]);
        let i = 0;
        anim = new Konva.Animation(function (frame) {
            if (i === data2[0].length) {
                i = 0;
                anim.stop();
            }
            image2.scaleX(1 - data2[0][i]["x3"] / 5);
            rect2.x( image2.width()*image2.scaleX() - image2.width() );
            i++;
        }, animlayer);
        anim.start();
        await draw();
        animI = animI === 0 ? 1 : 0;
    });
    // setInterval(async () => {
    //     anim.stop();
    //     data1 = [];
    //     data2 = [];
    //     let url = "/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa";
    //     if (r !== null) {
    //         url = `/api/octaveAnimation?apikey=aaaaaaaaaaaaaaaaaaaaaa&iteration='1'`;
    //     }
    //     const request = new Request(url, {
    //         method: "GET",
    //     });
    //     const respData = await fetch(request);
    //     const respJSON = await respData.json();
    //     data1.push(respJSON.data.y);
    //     data2.push(respJSON.data.x);

    //     let i = 0;
    //     anim = new Konva.Animation(function (frame) {
    //         if (i === data2[0].length) {
    //             i = 0;
    //         }
    //         image2.scaleX(1 + data2[0][i]["x3"]);
    //         rect2.x(data2[0][i]["x3"] + rect2.x());
    //         i++;
    //     }, animlayer);
    //     anim.start();
    //     draw();
    // }, 5000);
};
imageObj.src = "/storage/images/spring.png";
