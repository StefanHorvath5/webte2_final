const simulationAnim = document.querySelector("#simulationAnim");
const graphContainer = document.querySelector("#graphContainer");
const graf = document.querySelector("#simulaciaGraf");

const animationCheckbox = document.querySelector("#animationCheckbox");
const graphCheckbox = document.querySelector("#graphCheckbox");

animationCheckbox.addEventListener("input", () => {
    simulationAnim.style.display = animationCheckbox.checked ? "block" : "none";
});
graphCheckbox.addEventListener("input", () => {
    graphContainer.style.display = graphCheckbox.checked ? "block" : "none";
});
window.onload = () => {
    animationCheckbox.checked = true;
    graphCheckbox.checked = true;
};

let trace1 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgba(253,96,178,1)",
        width: 3,
    },
    name: "x0",
};

let trace2 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(76,226,245,1)",
        width: 3,
    },
    name: "x3",
};

let trace3 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(76,169,250)",
        width: 3,
    },
    name: "x2",
};

let trace4 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(163,76,245)",
        width: 3,
    },
    name: "x1",
};

let faketrace1 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgba(253,96,178,1)",
        width: 3,
    },
    name: "x0",
};

let faketrace2 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(76,226,245,1)",
        width: 3,
    },
    name: "x3",
};

let faketrace3 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(76,169,250)",
        width: 3,
    },
    name: "x2",
};

let faketrace4 = {
    x: [],
    y: [],
    type: "scatter",
    line: {
        color: "rgb(163,76,245)",
        width: 3,
    },
    name: "x1",
};

let r = null;

let data1 = [];
let data2 = [];
let cnt = 0;
let count = 0;
let myInterval;
let graph;

const draw = () => {
    trace1.x = []; trace1.y = []; trace2.x = []; trace2.y = []; trace3.x = []; trace3.y = []; trace4.x = []; trace4.y = [];

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

    graph = [];

    myInterval = setInterval(() => {
        Plotly.extendTraces(graf, {
                y: [
                    [trace1.y[count]],
                    [trace2.y[count]],
                    [trace3.y[count]],
                    [trace4.y[count]],
                ],
                x: [[count], [count], [count], [count]],
            },
            [0, 1, 2, 3]
        );
        cnt++;
        count++;
        if (cnt > 500) clearInterval(myInterval);
    }, 10);
};

let font = "Arial";
let fontsize = 20;

let baselayer = new Konva.Stage({
    container: "simulationAnim",
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
        cnt = 0;
        count = 0;
        clearInterval(myInterval);

        graph = [];
        faketrace1.x = []; faketrace1.y = []; faketrace2.x = []; faketrace2.y = []; faketrace3.x = []; faketrace3.y = []; faketrace4.x = []; faketrace4.y = [];

        anim.stop();
        data1 = [];
        data2 = [];
        let rValue = document.querySelector("#rValue");
        let rInput =
            rValue.value === null ||
            isNaN(rValue.value) ||
            rValue.value > 0.2 ||
            rValue.value < -0.2
                ? 0.1
                : rValue.value;
        let url = `${process.env.MIX_APP_URL}/api/octaveAnimation?apikey=${process.env.MIX_API_KEY}&rValue=${rInput}`;
        const request = new Request(url, {
            method: "GET",
        });
        const respData = await fetch(request);
        const respJSON = await respData.json();
        data1.push(respJSON.data.y);
        data2.push(respJSON.data.x);
        let i = 0;
        anim = new Konva.Animation(function (frame) {
            if (i === data2[0].length) {
                i = 0;
                anim.stop();
            }
            image.scaleX(1 - data2[0][i]["x1"] / 5);
            rect1.x( image.width()*image.scaleX() - image.width() );
            image2.x( image.width()*image.scaleX() + 70  );
            image2.scaleX(1 - data2[0][i]["x3"] / 5);
            rect2.x( image2.width()*image2.scaleX() - image2.width() + image.width()*image.scaleX() - image.width() );
            i++;
        }, animlayer);
        anim.start();
        draw();
        document.querySelector("#simulaciaGraf").scrollIntoView({
            behavior: "smooth",
            block: "end",
            inline: "nearest",
        });
        animI = animI === 0 ? 1 : 0;
    });
};
imageObj.src = `${process.env.MIX_APP_URL}/storage/images/spring.png`;
