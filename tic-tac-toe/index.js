let clickNum = 1;
const turnText = 'turnText';
const winText = 'winText';

function updateBoard() {
    var field1 = document.getElementById('field1');
    var field2 = document.getElementById('field2');
    var field3 = document.getElementById('field3');
    var field4 = document.getElementById('field4');
    var field5 = document.getElementById('field5');
    var field6 = document.getElementById('field6');
    var field7 = document.getElementById('field7');
    var field8 = document.getElementById('field8');
    var field9 = document.getElementById('field9');

    var board = [null, field1, field2, field3, field4, field5, field6, field7, field8, field9];

    return board;
}

function printWin(win, mark) {
    if (win == 'win') {
        document.getElementById(winText).innerHTML = mark;
        alert(mark + ' won the game!!!');
        setTimeout(() => {
            location.reload();
        }, 1000);
        return;
    }
    if (win == 'tie') {
        document.getElementById(winText).innerHTML = 'TIE';
        alert('NOBODY' + ' won the game!!!');
        setTimeout(() => {
            location.reload();
        }, 1000);
        return;
    }
    return;
}

function checkWin(field) {

    if ((field[1].innerHTML == 'X' && field[2].innerHTML == 'X' && field[3].innerHTML == 'X') ||
        (field[4].innerHTML == 'X' && field[5].innerHTML == 'X' && field[6].innerHTML == 'X') ||
        (field[7].innerHTML == 'X' && field[8].innerHTML == 'X' && field[9].innerHTML == 'X') ||
        (field[1].innerHTML == 'X' && field[5].innerHTML == 'X' && field[9].innerHTML == 'X') ||
        (field[3].innerHTML == 'X' && field[5].innerHTML == 'X' && field[7].innerHTML == 'X') ||
        (field[1].innerHTML == 'X' && field[4].innerHTML == 'X' && field[7].innerHTML == 'X') ||
        (field[2].innerHTML == 'X' && field[5].innerHTML == 'X' && field[8].innerHTML == 'X') ||
        (field[3].innerHTML == 'X' && field[6].innerHTML == 'X' && field[9].innerHTML == 'X') ||
        (field[1].innerHTML == 'O' && field[2].innerHTML == 'O' && field[3].innerHTML == 'O') ||
        (field[4].innerHTML == 'O' && field[5].innerHTML == 'O' && field[6].innerHTML == 'O') ||
        (field[7].innerHTML == 'O' && field[8].innerHTML == 'O' && field[9].innerHTML == 'O') ||
        (field[1].innerHTML == 'O' && field[5].innerHTML == 'O' && field[9].innerHTML == 'O') ||
        (field[3].innerHTML == 'O' && field[5].innerHTML == 'O' && field[7].innerHTML == 'O') ||
        (field[1].innerHTML == 'O' && field[4].innerHTML == 'O' && field[7].innerHTML == 'O') ||
        (field[2].innerHTML == 'O' && field[5].innerHTML == 'O' && field[8].innerHTML == 'O') ||
        (field[3].innerHTML == 'O' && field[6].innerHTML == 'O' && field[9].innerHTML == 'O')) {
        return 'win';
    }

    if (field[1].innerHTML != '.' &&
        field[2].innerHTML != '.' &&
        field[3].innerHTML != '.' &&
        field[4].innerHTML != '.' &&
        field[5].innerHTML != '.' &&
        field[6].innerHTML != '.' &&
        field[7].innerHTML != '.' &&
        field[8].innerHTML != '.' &&
        field[9].innerHTML != '.') {
        return 'tie';
    }

    return;
}

function markOnBoard(div) {
    let mark;
    clickNum % 2 === 0 ? mark = 'X' : mark = 'O';
    clickNum += 1;
    let field = div.getAttribute("class").split(' ')[1];
    document.getElementById(field).innerHTML = mark;
    mark == 'X' ? document.getElementById(turnText).innerHTML = 'O' : document.getElementById(turnText).innerHTML = 'X';
    let board = updateBoard();
    checkWin(board);
    printWin(checkWin(board), mark);
}