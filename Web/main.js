//O evento DOM Content Loaded é ativado quando o arquivo HTML é carregado 
//e passado. 

document.addEventListener('DOMContentLoaded', () => {


    //Metodo que seleciona a classe tetris-box
    const grid = document.querySelector('.tetris-box');

    //seleciona os botões de seleção de tamanho
    const smallGridBtn = document.getElementById('smallGridBtn');
    
    const largeGridBtn = document.getElementById('largeGridBtn');

    /*******************Tamanho do Tabuleiro********************** */

    smallGridBtn.addEventListener('click', function() {
        startGame(200);
        smallGridBtn.remove();
        largeGridBtn.remove();
    })

    largeGridBtn.addEventListener('click', function() {
        startGame(968);
        smallGridBtn.remove();
        largeGridBtn.remove();
    })

    //Função criadora das células:
    function createGrid(numCells) {
        for (let aux = 0; aux < numCells; aux++) {
            const cell = document.createElement('div');
            cell.className = 'cell';
            grid.appendChild(cell);
        }
    }
    
    /***************Definição do Timer**************/

    //timer
    let time = 0;
    const timerElem = document.getElementById('timer');

    function updateCounter() {
        time++;
        timerElem.innerHTML = `${time}`;
    }


    /**********Estruturas de dados das formas***********/

    /*Cria o array de cores para as peças*/
    const colors = [
        'orange',
        'red',
        'purple',
        'rgb(255, 255, 0)',
        'rgb(0, 173, 230)', 
        'blue',
        'green',
        'pink' 
      ];
    
    //As formas:
    //width é a quantidade de células ordenadas horizontalmente
    let width = 10;
    let position = 10;
    //width é a quantidade de células ordenadas horizontalmente
    shapes = initShapes(width);
    let random = Math.floor(Math.random() * shapes.length); 


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



    /****************Exibição das formas seguintes *********************/

    const nextShapeGrid = document.querySelector('.nextshape');

    let nextSquares = Array.from(document.querySelectorAll('.nextshape div'));
    let nextIndex = 0;

    function drawNextShape () {
        nextSquares.forEach(square => {
            square.classList.remove('shape');
        })
        upNextShape[random].forEach(index => {
            nextSquares[nextIndex + index].classList.add('shape');
            nextSquares[nextIndex + index].style.backgroundColor = colors[random];
        })
    }

    /****************Exibição das formas*********************/

    let currentShape = shapes[random][0];

    function initShapes(width) {
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
    
        return  [lShape, zShape, tShape, squareShape, iShape];
    }
    
    function drawShape() {
        /*Cria o array a partir dos divs*/
        let squares = Array.from(document.querySelectorAll('.cell'));
        currentShape.forEach(index => {
            squares[position + index].classList.add('shape');
        });
    }
    
    function undoDraw() {
        let squares = Array.from(document.querySelectorAll('.cell'));
        currentShape.forEach(index => {
            squares[position + index].classList.remove('shape');
        });
    }
    
    function moveDown() {
        undoDraw();
        position += width;
        drawShape();
    }
    
    function moveLeft() {
        undoDraw();
        const isAtLeftEdge = currentShape.some(index => (position + index) % width === 0);
        if (!isAtLeftEdge) {
          if (currentShape.every(index => squares[position + index - 1].classList.contains('shape'))) {
            return;
          }
          position -= 1;
        }
        drawShape();
      }
      
    function moveRight() {
        undoDraw();
        const isAtRightEdge = currentShape.some(index => (position + index) % width === width - 1);
        if (!isAtRightEdge) {
            if (currentShape.every(index => squares[position + index + 1].classList.contains('shape'))) {
            return;
            }
            position += 1;
        }
        drawShape();
    }

    /************Início do jogo ****************/

    //Função que dá início ao jogo
    function startGame (numSquares) {
        createGrid(numSquares);


        //edita o valor que representa a altura e largura de cada bloco:
        let cells = document.querySelectorAll('.cell');
        if(numSquares == 968) {
            cells.forEach(cell => {
                cell.style.height = '11.35px';
                cell.style.width = '11.35px';
            });    
        }

        const timer = setInterval(updateCounter, 1000);
        drawNextShape();
        const move = setInterval(moveDown, 200);
    }


    

    

})
