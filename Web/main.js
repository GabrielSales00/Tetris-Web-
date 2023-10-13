//O evento DOM Content Loaded é ativado quando o arquivo HTML é carregado 
//e passado. 

document.addEventListener('DOMContentLoaded', () => {
    /*Esse método procura por algum elemento no .html cuja classe 
    tem o nome de "tetris-box" */
    /*Agora sempre que modificarmos 'tetris-box', queremos modificar todos
    os elementos englobados na class*/ 
    const grid = document.querySelector('.tetris-box');

    /*Cria o array a partir dos divs*/
    let squares = Array.from(document.querySelectorAll('.tetris-box div'));

        
    const width = 10;


    console.log(squares);

    //As formas:
    
    /*formato de L. Representado por um vetor com quatro vetores dentro
    cada vetor representa o formato assumido por cada rotação*/
    const lShape = [
        //forma: [posição em y (width) + posição em x] (posição dos quadrados)
        [1, width+1, width*2+1, 2],
        [width, width + 1, width + 2, width*2+2],
        [1, width+1, width*2+1, width*2],
        [width, width*2, width*2+1, width*2+2] 
    ]

    const zShape = [
        [width*2, width+1, width*2 +1, width +2 ],
        [0, width, width + 1, width*2 + 1],
        [width*2, width + 1, width*2 + 1, width + 2],
        [0, width, width + 1, width*2 + 1]
    ]

    const tShape = [
        [width, 1, width + 1, width + 2],
        [1, width + 1, width*2 + 1, width + 2],
        [width, width + 1, width * 2 + 1, width +2],
        [width, 1, width + 1, width * 2 + 1]
    ]

    const squareShape = [
        [0, width, 1, width + 1],
        [0, width, 1, width + 1],
        [0, width, 1, width + 1],
        [0, width, 1, width + 1]
    ]

    const iShape = [
        [1, width + 1, width *2 + 1, width *3 + 1],
        [width, width + 1, width + 2, width + 3],
        [1, width + 1, width *2 + 1, width *3 + 1],
        [width, width + 1, width + 2, width + 3]
    ]

    const shapes = [lShape, zShape, tShape, iShape, squareShape];

    let random = Math.floor(Math.random() * shapes.length);



    console.log(shapes);




    //NextShape

    /*Representação das primeiras posições em função de 'DisplayWdith'*/

    const displayWidth = 4;

    const upNextShape = [
        [displayWidth*1+1, displayWidth*1+2, displayWidth * 2 + 1, displayWidth * 3 + 1], // L
        [displayWidth + 1, displayWidth*2 +1, displayWidth*2 + 2, displayWidth * 3 + 2], //Z
        [displayWidth + 1, displayWidth*2 + 1, displayWidth*3 + 1, displayWidth*2 + 2], //t
        [displayWidth*2+1, displayWidth*2+2, displayWidth*3 + 1, displayWidth*3 + 2], //square
        [1, displayWidth + 1, displayWidth * 2 + 1, displayWidth*3 + 1] //I
    ]

    const nextShapeGrid = document.querySelector('.nextshape');

    let nextSquares = Array.from(document.querySelectorAll('.nextshape div'));


    let nextIndex = 0;

    function drawNextShape () {
        nextSquares.forEach(square => {
            square.classList.remove('shape');
        })
        upNextShape[random].forEach(index => {
            nextSquares[nextIndex + index].classList.add('shape');
        })
    }


    drawNextShape();


    

})
