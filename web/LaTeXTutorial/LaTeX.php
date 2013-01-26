<?php
$path_parts = pathinfo(__FILE__);
include("../Setup/preheader.php");
?>
<head>
    <link type="text/css" rel="stylesheet" href="../Tutorials/SyntaxColors.css">
    <script src="../Setup/qtip.js"></script>
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
        <div>
            <p class="bodyparagraph">
                Another important aspect of professional documents is tables. These are especially important in 
                resumes, white papers, and research papers when custom formatting is needed. Creating the actual 
                table is easy, tweaking it to look perfect might take more time down the road. Let's take a 
                look at an easy one.
            </p>
            <div class="latex" id="example1">
                <ol>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8" id="tabular">\begin</span><span class="br0">{</span><span class="re9"><span class="re7">tabular</span></span><span class="br0">}</span><span class="br0">{</span><span class="re9"> l c r </span><span class="br0">}</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="nu0">1</span> <span class="sy0">&</span> <span class="nu0">2</span> <span class="sy0">&</span> <span class="nu0">3</span> <span class="sy0">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="nu0">4</span> <span class="sy0">&</span> <span class="nu0">5</span> <span class="sy0">&</span> <span class="nu0">6</span> <span class="sy0">\\</span>
                        </div>
                    </li>
                    <li class="li1">
                        <div class="de1">
                            <span class="re8">\end</span><span class="br0">{</span><span class="re9"><span class="re7">tabular</span></span><span class="br0">}</span>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="bodyparagraph">
                Easy peasy. When you compile the document you should see a two row by three column table with 
                the numbers 1 through 6 in it. Now let's break down the code and see how it works.
            </p>
        </div>
        <h3 style="padding-top: 15px" id="fonts">Font Sizes</h3>
        <div>
            <p class="bodyparagraph">
                
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

<script type="text/javascript">
    $(document).ready(function() 
    {
        $('exercises').qtip(
        {
            content: 'Some basic content for the tooltip'
        });
    });
</script>

<?php include("../Templates/Bottom.php"); ?>