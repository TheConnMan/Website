<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<head>
    <link type="text/css" rel="stylesheet" href="../Tutorials/SyntaxColors.css">
</head>

<title>LaTex</title>

<?php include("../Templates/Top.php"); ?>

<div>
LaTex
<ul>
    <li>
        <a href="#intro">Intro</a>
        <ul>
            <li><a href="#installation">Installation</a></li>
        </ul>
    </li>
    <li><a href="#firstDocument">Your First Document</a></li>
    <li>
        <a href="#basics">Basic Commands</a>
        <ul>
            <li><a href="#emphasis">Emphasis</a></li>
        </ul>
    </li>
</ul>
</div>

<?php include("../Templates/Middle.php"); ?>

<h1 style="text-align: center">LaTex</h1>
<div style="text-align: left">
    <h2 id="intro">Intro</h2>
    <div>
        <p class="bodyparagraph">
            Welcome to my LaTex tutorial! This tutorial should be pretty short. For more details email me 
            or Google it because that's what I'll do.
        </p>
        <p class="bodyparagraph">
            Ever see a PDF that looks really good? It's probably because it was written in Latex. An example 
            of an awesome PDF is my <a href="../Setup/Brian Conn's Resume.pdf">resume</a>. Pretty impressive. 
            It looks nice too.
        </p>
        <h3 style="padding-top: 15px" id="installation">Installation</h3>
        <p class="bodyparagraph">
            First, we need to download and install LaTex. All distributions are a little big (~1 Gb) and can 
            be found <a href="http://www.latex-project.org/ftp.html">here</a>. Follow the instructions and 
            you'll have it installed in no time.
        </p>
    </div>
    <h2 style="padding-top: 15px" id="firstDocument">Your First Document</h2>
    <div>
        <p class="bodyparagraph">
            To start out we're going to try a super simple document: some words on a page. Open up TeXworks and 
            enter the following code into a new document. Run Typeset and see the results.
        </p>
        <div class="latex">
            <ol>
                <li class="li1">
                    <div class="de1">
                        <span class="sy0">\</span><span class="kw1">documentclass</span><span class="br0">&#91;</span><span class="re2">letter</span><span class="br0">&#93;</span><span class="br0">&#123;</span><span class="re9">article</span><span class="br0">&#125;</span>
                    </div>
                </li>
                <li class="li1">
                    <div class="de1">
                        <span class="re8">\begin</span><span class="br0">&#123;</span><span class="re9"><span class="re7">document</span></span><span class="br0">&#125;</span>
                    </div>
                </li>
                <li class="li1">
                    <div class="de1">Hello World!</div>
                </li>
                <li class="li1">
                    <div class="de1">
                        <span class="re8">\end</span><span class="br0">&#123;</span><span class="re9"><span class="re7">document</span></span><span class="br0">&#125;</span>
                    </div>
                </li>
            </ol>
        </div>
        <p class="bodyparagraph">
            You should see a PDF with "Hello World!" displayed on the page. Not too exciting, but you have to 
            start somewhere. We'll work on commands first then formatting because I think learning commands is 
            more important to begin with. Once you get the hang of how LaTex works you'll be able to look things 
            up and customize already put together .tex files. Learning formatting first won't allow you to do this.
        </p>
    </div>
    
    <h2 style="padding-top: 15px" id="basics">Basic Commands</h2>
    <div>
        <p class="bodyparagraph">
            You'll see some very repetitive syntax when dealing with LaTex. Almost all of the commands are 
            formated like <code>/command{input}</code>. The difference is we're not writing "code" persay. 
            Instead we're creating a document, so "inputs" are just things we're writing. Let's take a look 
            at some simple commands.
        </p>
        <p class="bodyparagraph">
            Also, to save space, for this section I will only be posting code that goes between the <code>
            /begin{document}</code> and <code>/end{document}</code> tags.
        </p>
        <h3 style="padding-top: 15px" id="emphasis">Emphasis, Bold, and Underline</h3>
        <div>
            <p class="bodyparagraph">
                The most basic commands are italics, bolding, and underlining. Let's look at an example with all 
                of them.
            </p>
        </div>
    </div>
    
</div>

<?php include("../Templates/Bottom.php"); ?>