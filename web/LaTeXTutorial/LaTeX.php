<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<head>
    <link type="text/css" rel="stylesheet" href="../Tutorials/SyntaxColors.css">
</head>

<title>LaTeX</title>

<?php include("../Templates/Top.php"); ?>

<div>
    LaTeX
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
                <li><a href="#tables">Tables</a></li>
                <li><a href="#fonts">Font Sizes</a></li>
            </ul>
        </li>
        <li><a href="#math">Math Symbols</a></li>
        <li>
            <a href="#formatting">Formatting</a>
            <ul>
                <li><a href="#packages">Packages</a></li>
                <li><a href="#documentClass">Document Class</a></li>
                <li><a href="#sections">Sections</a></li>
                <li><a href="#borders">Borders</a></li>
                <li><a href="#images">Images</a></li>
                <li><a href="#bib">Bibliographies</a></li>
            </ul>
        </li>
        <li><a href="#exercises">Exercises</a></li>
    </ul>
</div>

<?php include("../Templates/Middle.php"); ?>

<h1 style="text-align: center">LaTeX</h1>
<div style="text-align: left">
    <h2 id="intro">Intro</h2>
    <div>
        <p class="bodyparagraph">
            Welcome to my LaTeX tutorial! This tutorial should be pretty short. For more details <a href="mailto:bcconn2112@gmail.com">email me</a> 
            or Google it because that's what I'll do.
        </p>
        <p class="bodyparagraph">
            Ever see a PDF that looks really good? It's probably because it was written in Latex. An example 
            of an awesome PDF is my <a href="../Setup/Brian Conn's Resume.pdf">resume</a>. Pretty impressive,  
            I know. It's well formatted too.
        </p>
        <h3 style="padding-top: 15px" id="installation">Installation</h3>
        <p class="bodyparagraph">
            First, we need to download and install LaTeX. All distributions are a little big (~1 Gb) and can 
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
                        <span class="re8">\documentclass</span><span class="br0">&#91;</span><span class="re2">letter</span><span class="br0">&#93;</span><span class="br0">&#123;</span><span class="re9">article</span><span class="br0">&#125;</span>
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
            more important to begin with. Once you get the hang of how LaTeX works you'll be able to look things 
            up and customize already put together .tex files. Learning formatting first won't allow you to do this.
        </p>
    </div>
    <h2 style="padding-top: 15px" id="basics">Basic Commands</h2>
    <div>
        <p class="bodyparagraph">
            You'll see some very repetitive syntax when dealing with LaTeX. Almost all of the commands are 
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
            <div class="latex">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8">\emph</span><span class="br0">{</span><span class="re9">Italics</span><span class="br0">}</span> <span class="sy0">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8">\textbf</span><span class="br0">{</span><span class="re9">Bold</span><span class="br0">}</span> <span class="sy0">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8">\underline</span><span class="br0">{</span><span class="re9">Underline</span><span class="br0">}</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Pretty simple. Most of the commands are human readable too so reading a .tex file should at 
                least give you an idea of how a PDF will look like.
            </p>
            <p class="bodyparagraph">
                Astute readers will notice there were two 
                addition pieces of code in the example above: backslash pairs. If you remove these you'll see 
                that the two phrases which surrounded the backslashes are on the same line. This is because 
                the backslash pairs end the line and go onto the next one. LaTeX will automatically format 
                things to fit well when it is compiled, but for custom formatting it is useful.
            </p>
        </div>
        <h3 style="padding-top: 15px" id="tables">Tables</h3>
        <div id="table">
            <p class="bodyparagraph">
                Another important aspect of professional documents is tables. These are especially important in 
                resumes, white papers, and research papers when custom formatting is needed. Creating the actual 
                table is easy, tweaking it to look perfect might take more time down the road. Let's take a 
                look at an easy one.
            </p>
            <div style="position: relative;" class="latex">
                <img class="result" style="position: absolute; top: 10px; left: 500px;" src="Table.png">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8 begin">\begin</span><span class="br0">{</span><span class="re9"><span class="re7 tabular">tabular</span></span><span class="br0">}</span><span class="br0">{</span><span class="re9 positions"> l c r </span><span class="br0">}</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="nu0 element">1</span> <span class="sy0 separator">&</span> <span class="nu0 element">2</span> <span class="sy0 separator">&</span> <span class="nu0 element">3</span> <span class="sy0 newline">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="nu0 element">4</span> <span class="sy0 separator">&</span> <span class="nu0 element">5</span> <span class="sy0 separator">&</span> <span class="nu0 element">6</span> <span class="sy0 newline">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8 end">\end</span><span class="br0">{</span><span class="re9"><span class="re7 tabular">tabular</span></span><span class="br0">}</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Easy peasy. When you compile the document you should see a two row by three column table with 
                the numbers 1 through 6 in it. Roll over the code to see how it works.
            </p>
            <p class="bodyparagraph">
                There are a lot of additional parts you can put on a table. Below is another, more complex, example.
            </p>
            <div style="position: relative;" class="latex">
                <img class="result" style="position: absolute; top: 10px; left: 500px;" src="Table2.png">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8 begin">\begin</span><span class="br0">{</span><span class="re9"><span class="re7 tabular">tabular</span></span><span class="br0">}</span><span class="br0">{</span><span class="sy0"><span class="re9 vline">| l || c | r |</span></span><span class="br0">}</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="sy0">\</span><span class="kw1 hline">hline</span></div></li>
                    <li class="li1">
                        <div class="de1">
                             <span class="nu0 element">Element 1</span> <span class="sy0 separator">&</span> <span class="nu0 element">Element 2</span> <span class="sy0 separator">&</span> <span class="nu0 element">Element 3</span> <span class="sy0 newline">\\</span></div></li>
                    <li class="li1">
                        <div class="de1">
                            <span class="sy0">\</span><span class="kw1 hline">hline</span> <span class="sy0">\</span><span class="kw1 hline">hline</span> </div></li>
                    <li class="li2">
                        <div class="de2">
                            <span class="nu0 element">4</span> <span class="sy0 separator">&</span> <span class="nu0 element">5</span> <span class="sy0 separator">&</span> <span class="nu0 element">6</span> <span class="sy0 newline">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="re12 cline">\cline</span><span class="br0">{</span><span class="re9 columns">2-3</span><span class="br0">}</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="nu0 element">7</span> <span class="sy0 separator">&</span> <span class="nu0 element">8</span> <span class="sy0 separator">&</span> <span class="nu0 element">9</span> <span class="sy0 newline">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="sy0">\</span><span class="kw1 hline">hline</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="re12 multicolumn">\multicolumn</span><span class="br0">{</span><span class="re9 columnnum">2</span><span class="br0">}</span><span class="br0">{</span><span class="sy0"><span class="re9 multivline">| l |</span></span><span class="br0">}</span><span class="br0">{</span><span class="re9 element">Two columns combined into one</span><span class="br0">}</span> <span class="sy0 separator">&</span> <span class="nu0 element">7</span> <span class="sy0 newline">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="sy0">\</span><span class="kw1 hline">hline</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8 end">\end</span><span class="br0">{</span><span class="re9"><span class="re7 tabular">tabular</span></span><span class="br0">}</span>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
        <h3 style="padding-top: 15px" id="fonts">Font Sizes</h3>
        <div>
            <p class="bodyparagraph">
                These don't really fit in anywhere but are helpful in making resumes so I just put it here. 
                To change font sizes across a whole section use the <a href="#documentClass">document class</a> 
                command, but it is easy to change small bits of text locally. Check out the example below.
            </p>

        </div>
    </div>
    <h2 style="padding-top: 15px" id="math">Math Symbols</h2>
    <div>

    </div>
    <h2 style="padding-top: 15px" id="formatting">Formatting</h2>
    <div>
        <p class="bodyparagraph">

        </p>
        <h3 style="padding-top: 15px" id="packages">Packages</h3>
        <div>
            <p class="bodyparagraph">

            </p>
        </div>
        <h3 style="padding-top: 15px" id="documentClass">Document Class</h3>
        <div>
            <p class="bodyparagraph">

            </p>
        </div>
        <h3 style="padding-top: 15px" id="sections">Sections</h3>
        <div>
            <p class="bodyparagraph">

            </p>
        </div>
        <h3 style="padding-top: 15px" id="borders">Borders</h3>
        <div>
            <p class="bodyparagraph">

            </p>
        </div>
        <h3 style="padding-top: 15px" id="images">Images</h3>
        <div>
            <p class="bodyparagraph">

            </p>
        </div>
        <h3 style="padding-top: 15px" id="bib">Bibliographies</h3>
        <div>
            <p class="bodyparagraph">

            </p>
        </div>
    </div>
    <h2 style="padding-top: 15px" id="exercises">Exercises</h2>
    <div>
        <p class="bodyparagraph">

        </p>
    </div>
</div>

<script type="text/javascript" src="../Setup/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../Setup/qtip.js"></script>
<script type="text/javascript">
    $(document).ready(function() 
    {
        $(".result").each(function(i) {
            $(this).css("left",$(".latex").width()-$(this).width()+50);
        });
<?php
$examples = array("table");
$classes = array
    (
    "table" => array
        (
        ".begin", ".tabular", ".positions", ".newline", ".element", ".separator", ".end", ".vline", ".hline", ".cline", ".columns", ".multicolumn", ".columnnum", ".multivline", ".result"
    )
);
$content = array
    (
    "table" => array
        (
        "The begin command initiates a type of structure like \\\begin{document}",
        "The structure used is a table",
        "These determine how many elements there are and how they are aligned (l: left, c: center, r: right)",
        "The newline command goes to the next row",
        "These are the actual table elements",
        "& designates the end of a column element",
        "The end command ends the current structure",
        "Adding | between position keys adds vertical lines into the table between those columns",
        "Adding \\\hline between rows adds horizontal lines",
        "\\\cline adds horizontal lines that only span certain columns",
        "The inputs determine which columns the horizontal line spans",
        "The multicolumn command combines columns",
        "The first input is how many columns will be comined",
        "The second input is vertical lines and positioning of the new column",
        "This is the resulting table of the compiled code"
    )
);
$target = array
    (
    "table" => array
        (
        "topMiddle", "topMiddle", "topMiddle", "rightMiddle", "leftMiddle", "topMiddle", "bottomMiddle", "topMiddle", "leftMiddle", "leftMiddle", "rightMiddle", "leftMiddle", "bottomMiddle", "topMiddle", "topMiddle"
    )
);
$tip = array
    (
    "table" => array
        (
        "bottomRight", "bottomMiddle", "bottomLeft", "leftMiddle", "rightMiddle", "bottomRight", "topRight", "bottomLeft", "rightMiddle", "rightMiddle", "leftMiddle", "rightMiddle", "topMiddle", "bottomLeft", "bottomMiddle"
    )
);
for ($j = 0; $j < sizeof($classes); $j++) {
    for ($i = 0; $i < sizeof($classes[$examples[$j]]); $i++) {
        echo "$('#";
        echo $examples[$j];
        echo " ";
        echo $classes[$examples[$j]][$i];
        echo "').qtip({
            content: '";
        echo $content[$examples[$j]][$i];
        echo "',
            position: {
                corner: {
                    target: '";
        echo $target[$examples[$j]][$i];
        echo "',
                    tooltip: '";
        echo $tip[$examples[$j]][$i];
        echo "'
                }
            },
            style: {
                name: 'dark',
                tip: '";
        echo $tip[$examples[$j]][$i];
        echo "'
            }
        });
        ";
    }
}
?>
    });
</script>

<?php include("../Templates/Bottom.php"); ?>