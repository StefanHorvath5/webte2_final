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

let faketrace1 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgba(253,96,178,1)",
        width: 3,
    },
    name: "Sinus",
};

let faketrace2 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(76,226,245,1)",
        width: 3,
    },
    name: "Cosinus",
};

let faketrace3 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(76,169,250)",
        width: 3,
    },
    name: "Cosinus",
};

let faketrace4 = {
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


let cnt = 0
let count = 0
let myInterval
let graph

const draw = () => {
    // let graph = [trace1, trace2, trace3, trace4];
    // graf.innerHTML = ""
    graph = [faketrace1, faketrace2, faketrace3, faketrace4];
    Plotly.newPlot(graf, graph, { responsive: false });

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

    graph = []
    // graph = [trace1, trace2, trace3, trace4];
    // Plotly.newPlot(graf, graph, { responsive: false });


    // let update = {
    //     'marker': {
    //         color: "red",
    //         size: 16
    //     }
    // }

    // let d = [
    //     {x: trace2.x, y: trace2.y}
    // ]

    // Plotly.restyle(graf, update, graph);

    graf = document.querySelector("#simulaciaGraf");

    
    myInterval = setInterval(() => {
        console.log("hi",count)
        Plotly.extendTraces(graf, {
            y: [[trace1.y[count]], [trace2.y[count]], [trace3.y[count]], [trace4.y[count]]],
            x: [[count], [count], [count], [count]],
            // y: [[data1[0][count]["x0"]], [data2[0][count]["x3"]], [data2[0][count]["x0"]], [data2[0][count]["x1"]]],
            // x: [[count], [count], [count], [count]],
        }, [0, 1, 2, 3])
        cnt++;
        count++;
        // if(cnt > 500) {
        //     Plotly.relayout(graf, {
        //         xaxis: {
        //             range: [cnt-500,cnt]
        //         }
        //     })
        // }
        if(cnt > 500) clearInterval(myInterval)
    }, 10)



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
    height: 200,
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
        y: 65,
        image: imageObj,
        width: 200,
        height: 75,
    });
    animlayer.add(image);

    image2 = new Konva.Image({
        x: 270,
        y: 65,
        image: imageObj,
        width: 200,
        height: 75,
    });
    animlayer.add(image);
    animlayer.add(image2);

    let anim = new Konva.Animation(function (frame) {});
    let animI = 0;
    animationButton.addEventListener("click", async () => {

        cnt = 0
        count = 0
        clearInterval(myInterval)
        
        // graf = document.querySelector("#simulaciaGraf");
        
        graph = []

        faketrace1.x = []
        faketrace1.y = []
        faketrace2.x = []
        faketrace2.y = []
        faketrace3.x = []
        faketrace3.y = []
        faketrace4.x = []
        faketrace4.y = []

        // Plotly.deleteTraces(graf, [0,1,2,3]);

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
        draw();
        document.querySelector("#simulaciaGraf").scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
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
