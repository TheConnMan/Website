/**
 * @author saf
 */

var whiteOnTop = true;
var canvas = document.getElementById("board");
var ctx = canvas.getContext("2d");
var rows = 8;
var cols = 8;
var gameOver = false;
var whiteScore = 0;
var blackScore = 0;
var turn = "white";
var boardModel;
var blockWidth = 40;

function newGame() {
	// Create the array
	// Board can be indexed matrix style as Board[x][y]
	boardModel = new Array(cols);
	for ( i = 0; i < boardModel.length; ++i) {
		boardModel[i] = new Array(rows);
		for ( j = 0; j < boardModel[i].length; ++j) {
			boardModel[i][j] = null;
		}
	}

	// place pieces
	if (whiteOnTop) {
		// pawns
		for ( i = 0; i < cols; ++i) {
			boardModel[i][1] = new piece("pawn", i, 1, "white");
			boardModel[i][6] = new piece("pawn", i, 6, "black");
		}
		// rooks
		boardModel[0][0] = new piece("rook", 0, 0, "white");
		boardModel[7][0] = new piece("rook", 7, 0, "white");
		boardModel[0][7] = new piece("rook", 0, 7, "black");
		boardModel[7][7] = new piece("rook", 7, 7, "black");
		// knights
		boardModel[1][0] = new piece("knight", 1, 0, "white");
		boardModel[6][0] = new piece("knight", 6, 0, "white");
		boardModel[1][7] = new piece("knight", 1, 7, "black");
		boardModel[6][7] = new piece("knight", 6, 7, "black");
		// bishops
		boardModel[2][0] = new piece("bishop", 2, 0, "white");
		boardModel[5][0] = new piece("bishop", 5, 0, "white");
		boardModel[2][7] = new piece("bishop", 2, 7, "black");
		boardModel[5][7] = new piece("bishop", 5, 7, "black");
		// king
		boardModel[3][0] = new piece("king", 3, 0, "white");
		boardModel[3][7] = new piece("king", 3, 7, "black");
		// queen
		boardModel[4][0] = new piece("queen", 4, 0, "white");
		boardModel[4][7] = new piece("queen", 4, 7, "black");
	} else {
		// pawns
		for ( i = 0; i < cols; ++i) {
			boardModel[i][1] = new piece("pawn", i, 1, "black");
			boardModel[i][6] = new piece("pawn", i, 6, "white");
		}
		// rooks
		boardModel[0][0] = new piece("rook", 0, 0, "black");
		boardModel[7][0] = new piece("rook", 7, 0, "black");
		boardModel[0][7] = new piece("rook", 0, 7, "white");
		boardModel[7][7] = new piece("rook", 7, 7, "white");
		// knights
		boardModel[1][0] = new piece("knight", 1, 0, "black");
		boardModel[6][0] = new piece("knight", 6, 0, "black");
		boardModel[1][7] = new piece("knight", 1, 7, "white");
		boardModel[6][7] = new piece("knight", 6, 7, "white");
		// bishops
		boardModel[2][0] = new piece("bishop", 2, 0, "black");
		boardModel[5][0] = new piece("bishop", 5, 0, "black");
		boardModel[2][7] = new piece("bishop", 2, 7, "white");
		boardModel[5][7] = new piece("bishop", 5, 7, "white");
		// king
		boardModel[4][0] = new piece("king", 4, 0, "black");
		boardModel[4][7] = new piece("king", 4, 7, "white");
		// queen
		boardModel[3][0] = new piece("queen", 3, 0, "black");
		boardModel[3][7] = new piece("queen", 3, 7, "white");
	}

	// start off
	drawBoard(boardModel);
}

function piece(type, col, row, color) {
	this.r = row;
	this.c = col;
	this.color = color;
	this.type = type;

	this.draw = function draw() {
		if (type == "pawn") {
			drawPawn(this.c, this.r, this.color);
		} else if (type == "rook") {
			drawRook(this.c, this.r, this.color);
		} else if (type == "knight") {
			drawKnight(this.c, this.r, this.color);
		} else if (type == "bishop") {
			drawBishop(this.c, this.r, this.color);
		} else if (type == "king") {
			drawKing(this.c, this.r, this.color);
		} else if (type == "queen") {
			drawQueen(this.c, this.r, this.color);
		}
	}

	this.getLegalMoves = function getLegalMoves(board) {
		moves = new Array();
		if (this.type == "pawn") {
			if (whiteOnTop) {
				if (this.color == "white") {
					// white piece, must move down.
					i = 0;
					if (board[this.c][this.r + 1] == null) {
						moves[i] = [this.c, this.r + 1]; ++i;
					}
					if (board[this.c][this.r + 2] == null) {
						moves[i] = [this.c, this.r + 2]; ++i;
					}
					try {
						if (board[this.c+1][this.r + 1] != null && board[this.c+1][this.r + 1].color == "black") {
							moves[i] = [this.c + 1, this.r + 1]; ++i;
						}
						if (board[this.c-1][this.r + 1] != null && board[this.c-1][this.r + 1].color == "black") {
							moves[i] = [this.c - 1, this.r + 1]; ++i;
						}
					} catch (e) {
					}
				} else {
					// black piece, must move up.
					i = 0;
					if (board[this.c][this.r - 1] == null) {
						moves[i] = [this.c, this.r - 1]; ++i;
					}
					if (board[this.c][this.r - 2] == null) {
						moves[i] = [this.c, this.r - 2]; ++i;
					}
					try {
						if (board[this.c+1][this.r - 1] != null && board[this.c+1][this.r - 1].color == "white") {
							moves[i] = [this.c + 1, this.r - 1]; ++i;
						}
						if (board[this.c-1][this.r - 1] != null && board[this.c-1][this.r - 1].color == "white") {
							moves[i] = [this.c - 1, this.r - 1]; ++i;
						}
					} catch (e) {
					}
				}
			} else {
				if (this.color == "black") {
					// black piece, must move down.
					i = 0;
					if (board[this.c][this.r + 1] == null) {
						moves[i] = [this.c, this.r + 1]; ++i;
					}
					if (board[this.c][this.r + 2] == null) {
						moves[i] = [this.c, this.r + 2]; ++i;
					}
					try {
						if (board[this.c+1][this.r + 1] != null && board[this.c+1][this.r + 1].color == "white") {
							moves[i] = [this.c + 1, this.r + 1]; ++i;
						}
						if (board[this.c-1][this.r + 1] != null && board[this.c-1][this.r + 1].color == "white") {
							moves[i] = [this.c - 1, this.r + 1]; ++i;
						}
					} catch (e) {
					}

				} else {
					// white piece, must move up.
					i = 0;
					if (board[this.c][this.r - 1] == null) {
						moves[i] = [this.c, this.r - 1]; ++i;
					}
					if (board[this.c][this.r - 2] == null) {
						moves[i] = [this.c, this.r - 2]; ++i;
					}
					try {
						if (board[this.c+1][this.r - 1] != null && board[this.c+1][this.r - 1].color == "black") {
							moves[i] = [this.c + 1, this.r - 1]; ++i;
						}
						if (board[this.c-1][this.r - 1] != null && board[this.c-1][this.r - 1].color == "black") {
							moves[i] = [this.c - 1, this.r - 1]; ++i;
						}
					} catch (e) {
					}
				}
			}
			return moves;
		}
		if (this.type == "rook") {
			i = 0;
			// north
			j = 1;
			while (true) {
				if (this.r - j < 0 || board[this.c][this.r - j] != null) {
					if (this.r - j >= 0 && board[this.c][this.r - j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c, this.r - j]; ++i;
					}
					break;
				}
				moves[i] = [this.c, this.r - j];
				++i; ++j;
			}
			// south
			j = 1;
			while (true) {
				if (this.r + j >= rows || board[this.c][this.r + j] != null) {
					if (this.r + j < rows && board[this.c][this.r + j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c, this.r + j]; ++i;
					}
					break;
				}
				moves[i] = [this.c, this.r + j];
				++i; ++j;
			}
			// east
			j = 1;
			while (true) {
				if (this.c + j >= cols || board[this.c+j][this.r] != null) {
					if (this.c + j < cols && board[this.c+j][this.r].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c + j, this.r]; ++i;
					}
					break;
				}
				moves[i] = [this.c + j, this.r];
				++i; ++j;
			}
			// west
			j = 1;
			while (true) {
				if (this.c - j < 0 || board[this.c-j][this.r] != null) {
					if (this.c - j >= 0 && board[this.c-j][this.r].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c - j, this.r]; ++i;

					}
					break;
				}
				moves[i] = [this.c - j, this.r];
				++i; ++j;
			}
		}
		if (this.type == "bishop") {
			i = 0;
			// northwest (--)
			j = 1;
			while (true) {
				if (this.r - j < 0 || this.c - j < 0 || board[this.c- j][this.r - j] != null) {
					if ((this.r - j >= 0) && (this.c - j >= 0) && board[this.c-j][this.r - j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c - j, this.r - j]; ++i;
					}
					break;
				}
				moves[i] = [this.c - j, this.r - j];
				++i; ++j;
			}
			// southeast (++)
			j = 1;
			while (true) {
				if (this.r + j >= rows || this.c + j >= cols || board[this.c+j][this.r + j] != null) {
					if ((this.r + j < rows) && (this.c + j < cols) && board[this.c+j][this.r + j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c + j, this.r + j]; ++i;
					}
					break;
				}
				moves[i] = [this.c + j, this.r + j];
				++i; ++j;
			}
			// northeast (+-)
			j = 1;
			while (true) {
				if (this.c + j >= cols || this.r - j < 0 || board[this.c+j][this.r - j] != null) {
					if (this.c + j < cols && this.r - j >= 0 && board[this.c+j][this.r - j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c + j, this.r - j]; ++i;
					}
					break;
				}
				moves[i] = [this.c + j, this.r - j];
				++i; ++j;
			}
			// southwest (-+)
			j = 1;
			while (true) {
				if (this.c - j < 0 || this.r + j >= rows || board[this.c-j][this.r + j] != null) {
					if (this.c - j >= 0 && this.r + j < rows && board[this.c-j][this.r + j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c - j, this.r + j]; ++i;
					}
					break;
				}
				moves[i] = [this.c - j, this.r + j];
				++i; ++j;
			}
		}
		if (this.type == "queen") {
			i = 0;
			// north
			j = 1;
			while (true) {
				if (this.r - j < 0 || board[this.c][this.r - j] != null) {
					if (this.r - j >= 0 && board[this.c][this.r - j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c, this.r - j]; ++i;
					}
					break;
				}
				moves[i] = [this.c, this.r - j];
				++i; ++j;
			}
			// south
			j = 1;
			while (true) {
				if (this.r + j >= rows || board[this.c][this.r + j] != null) {
					if (this.r + j < rows && board[this.c][this.r + j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c, this.r + j]; ++i;
					}
					break;
				}
				moves[i] = [this.c, this.r + j];
				++i; ++j;
			}
			// east
			j = 1;
			while (true) {
				if (this.c + j >= cols || board[this.c+j][this.r] != null) {
					if (this.c + j < cols && board[this.c+j][this.r].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c + j, this.r]; ++i;
					}
					break;
				}
				moves[i] = [this.c + j, this.r];
				++i; ++j;
			}
			// west
			j = 1;
			while (true) {
				if (this.c - j < 0 || board[this.c-j][this.r] != null) {
					if (this.c - j >= 0 && board[this.c-j][this.r].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c - j, this.r]; ++i;
					}
					break;
				}
				moves[i] = [this.c - j, this.r];
				++i; ++j;
			}
			// northwest (--)
			j = 1;
			while (true) {
				if (this.r - j < 0 || this.c - j < 0 || board[this.c- j][this.r - j] != null) {
					if ((this.r - j >= 0) && (this.c - j >= 0) && board[this.c-j][this.r - j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c - j, this.r - j]; ++i;
					}
					break;
				}
				moves[i] = [this.c - j, this.r - j];
				++i; ++j;
			}
			// southeast (++)
			j = 1;
			while (true) {
				if (this.r + j >= rows || this.c + j >= cols || board[this.c+j][this.r + j] != null) {
					if ((this.r + j < rows) && (this.c + j < cols) && board[this.c+j][this.r + j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c + j, this.r + j]; ++i;
					}
					break;
				}
				moves[i] = [this.c + j, this.r + j];
				++i; ++j;
			}
			// northeast (+-)
			j = 1;
			while (true) {
				if (this.c + j >= cols || this.r - j < 0 || board[this.c+j][this.r - j] != null) {
					if (this.c + j < cols && this.r - j >= 0 && board[this.c+j][this.r - j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c + j, this.r - j]; ++i;
					}
					break;
				}
				moves[i] = [this.c + j, this.r - j];
				++i; ++j;
			}
			// southwest (-+)
			j = 1;
			while (true) {
				if (this.c - j < 0 || this.r + j >= rows || board[this.c-j][this.r + j] != null) {
					if (this.c - j >= 0 && this.r + j < rows && board[this.c-j][this.r + j].color != this.color) {
						// then this is an opponent
						moves[i] = [this.c - j, this.r + j]; ++i;
					}
					break;
				}
				moves[i] = [this.c - j, this.r + j];
				++i; ++j;
			}
			return moves;
		}
		if (this.type == "king") {
			i = 0;
			// north
			if (this.r - 1 >= 0 && (board[this.c][this.r - 1] == null || board[this.c][this.r - 1].color != this.color)) {
				moves[i] = [this.c, this.r - 1]; ++i;
			}
			// northeast
			if (this.r - 1 >= 0 && this.c + 1 < cols && (board[this.c+1][this.r - 1] == null || board[this.c+1][this.r - 1].color != this.color)) {
				moves[i] = [this.c + 1, this.r - 1]; ++i;
			}
			// east
			if (this.c + 1 < cols && (board[this.c+1][this.r] == null || board[this.c+1][this.r].color != this.color)) {
				moves[i] = [this.c + 1, this.r]; ++i;
			}
			// southeast
			if (this.r + 1 < rows && this.c + 1 < cols && (board[this.c+1][this.r + 1] == null || board[this.c+1][this.r + 1].color != this.color)) {
				moves[i] = [this.c + 1, this.r + 1]; ++i;
			}
			// south
			if (this.r + 1 < rows && (board[this.c][this.r + 1] == null || board[this.c][this.r + 1].color != this.color)) {
				moves[i] = [this.c, this.r + 1]; ++i;
			}
			// southwest
			if (this.r + 1 < rows && this.c - 1 >= 0 && (board[this.c-1][this.r + 1] == null || board[this.c-1][this.r + 1].color != this.color)) {
				moves[i] = [this.c - 1, this.r + 1]; ++i;
			}
			// west
			if (this.c - 1 >= 0 && (board[this.c-1][this.r] == null || board[this.c-1][this.r].color != this.color)) {
				moves[i] = [this.c - 1, this.r]; ++i;
			}
			// northwest
			if (this.r - 1 >= 0 && this.c - 1 >= 0 && (board[this.c-1][this.r - 1] == null || board[this.c-1][this.r - 1].color != this.color)) {
				moves[i] = [this.c - 1, this.r - 1]; ++i;
			}
			return moves;
		}
		if (this.type == "knight") {
			i = 0;
			// NNE
			if (this.r - 2 >= 0 && this.c + 1 < cols && (board[this.c+1][this.r - 2] == null || board[this.c+1][this.r - 2].color != this.color)) {
				moves[i] = [this.c + 1, this.r - 2]; ++i;
			}
			// ENE
			if (this.r - 1 >= 0 && this.c + 2 < cols && (board[this.c+2][this.r - 1] == null || board[this.c+2][this.r - 1].color != this.color)) {
				moves[i] = [this.c + 2, this.r - 1]; ++i;
			}
			// ESE
			if (this.c + 2 < cols && this.r + 1 < rows && (board[this.c+2][this.r + 1] == null || board[this.c+2][this.r + 1].color != this.color)) {
				moves[i] = [this.c + 2, this.r + 1]; ++i;
			}
			// SSE
			if (this.r + 2 < rows && this.c + 1 < cols && (board[this.c+1][this.r + 2] == null || board[this.c+1][this.r + 2].color != this.color)) {
				moves[i] = [this.c + 1, this.r + 2]; ++i;
			}
			// SSW
			if (this.r + 2 < rows && this.c - 1 >= 0 && (board[this.c-1][this.r + 2] == null || board[this.c-1][this.r + 2].color != this.color)) {
				moves[i] = [this.c - 1, this.r + 2]; ++i;
			}
			// WSW
			if (this.r + 1 < rows && this.c - 2 >= 0 && (board[this.c-2][this.r + 1] == null || board[this.c-2][this.r + 1].color != this.color)) {
				moves[i] = [this.c - 2, this.r + 1]; ++i;
			}
			// WNW
			if (this.c - 2 >= 0 && this.r - 1 >= 0 && (board[this.c-2][this.r - 1] == null || board[this.c-2][this.r - 1].color != this.color)) {
				moves[i] = [this.c - 2, this.r - 1]; ++i;
			}
			// NNW
			if (this.r - 2 >= 0 && this.c - 1 >= 0 && (board[this.c-1][this.r - 2] == null || board[this.c-1][this.r - 2].color != this.color)) {
				moves[i] = [this.c - 1, this.r - 2]; ++i;
			}
			return moves;
		}
		return moves;
	}

	return this;
}

function drawBoard(board) {
	ctx.fillStyle = "#AAAAAA";
	ctx.fillRect(0, 0, 320, 320);
	ctx.fillStyle = "#888888";

	for ( i = 0; i < rows; ++i) {
		for ( j = 0; j < cols; ++j) {
			if ((i + j) % 2 == 1) {
				ctx.fillRect(i * blockWidth, j * blockWidth, blockWidth, blockWidth);
			}
		}
	}

	for ( i = 0; i < board.length; ++i) {
		for ( j = 0; j < board[i].length; ++j) {
			if (board[i][j] != null) {
				board[i][j].draw();
			}
		}
	}
}

// Functions to draw pieces onto the board, given color and location.
// Each canvas draw event can be replaced with an image placement.

function drawPawn(c, r, color) {
	if (color == "black") {
		ctx.fillStyle = "#000000";
	} else {
		ctx.fillStyle = "#FFFFFF";
	}
	ctx.beginPath();
	ctx.arc((c + 0.5) * blockWidth, (r + 0.5) * blockWidth, blockWidth / 4, 0, 2 * Math.PI, 0);
	ctx.fill();
}

function drawRook(c, r, color) {
	if (color == "black") {
		ctx.fillStyle = "#000000";
	} else {
		ctx.fillStyle = "#FFFFFF";
	}
	ctx.beginPath();
	ctx.fillRect((c + 0.3) * blockWidth, (r + 0.3) * blockWidth, blockWidth * .4, blockWidth * .4);
}

function drawKnight(c, r, color) {
	if (color == "black") {
		ctx.fillStyle = "#000000";
	} else {
		ctx.fillStyle = "#FFFFFF";
	}
	ctx.beginPath();
	ctx.fillRect((c + 0.2) * blockWidth, (r + 0.2) * blockWidth, blockWidth * 0.6, blockWidth * 0.6);
}

function drawBishop(c, r, color) {
	if (color == "black") {
		ctx.fillStyle = "#000000";
	} else {
		ctx.fillStyle = "#FFFFFF";
	}
	ctx.beginPath();
	ctx.arc((c + 0.5) * blockWidth, (r + 0.5) * blockWidth, blockWidth / 3, 0, 2 * Math.PI, 0);
	ctx.fill();
}

function drawQueen(c, r, color) {
	if (color == "black") {
		ctx.fillStyle = "#000000";
	} else {
		ctx.fillStyle = "#FFFFFF";
	}
	ctx.beginPath();
	ctx.arc((c + 0.5) * blockWidth, (r + 0.5) * blockWidth, blockWidth / 8, 0, 2 * Math.PI, 0);
	ctx.fill();
}

function drawKing(c, r, color) {
	if (color == "black") {
		ctx.fillStyle = "#000000";
	} else {
		ctx.fillStyle = "#FFFFFF";
	}
	ctx.beginPath();
	ctx.fillRect((c + 0.4) * blockWidth, (r + 0.4) * blockWidth, blockWidth * .2, blockWidth * .2);
}

// This should do stuff with removing pieces, etc.
function movePiece(board, oldC, oldR, newC, newR) {
	board[newC][newR] = board[oldC][oldR];
	board[oldC][oldR] = null;
	board[newC][newR].c = newC;
	board[newC][newR].r = newR;
	return board;
}

function selectRandomPiece(color, board) {
	i = 0;
	while (true) {
		r = Math.floor(Math.random() * rows);
		c = Math.floor(Math.random() * cols);
		if (board[c][r] != null && board[c][r].color == color) {
			return board[c][r];
		}++i;
		if (i >= 200) {
			alert("fail");
			return null;
		}
	}
}

function randomMove(board) {
	i = 0;
	while (true) {
		piece = selectRandomPiece(turn, board);
		moves = piece.getLegalMoves(board);
		if (moves.length > 0) {
			break;
		}++i;
		if (i >= 200) {
			alert("fail");
			return null;
		}
	}
	newMove = moves[Math.floor(Math.random() * moves.length)];
	movePiece(board, piece.c, piece.r, newMove[0], newMove[1]);
	drawBoard(board);
	changeTurn();
	return [piece.c, piece.r, newMove[0], newMove[1]];
}

function changeTurn() {
	if (turn == "black") {
		turn = "white";
	} else {
		turn = "black";
	}
}