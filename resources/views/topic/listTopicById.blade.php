@extends('layouts.gpt')

@section('content')
@if($topic != null)

<style>
    /* Reset de margens e paddings */
    * {
        box-sizing: border-box;
    }
    div .bbWrapper {
	/* Font & Text */
	font-family: "Segoe UI", "Helvetica Neue", Helvetica, Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", sans-serif;
	font-size: 15px;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	letter-spacing: normal;
	line-height: 21px;
	text-decoration: none solid rgb(253, 253, 253);
	text-align: start;
	text-indent: 0px;
	text-transform: none;
	vertical-align: baseline;
	white-space: normal;
	word-spacing: 0px;

	/* Color & Background */
	background-attachment: scroll;
	background-color: rgba(0, 0, 0, 0);
	background-image: none;
	background-position: 0% 0%;
	background-repeat: repeat;
	color: rgb(253, 253, 253);

	/* Box */
	height: 585.125px;
	width: 1082px;
	border: 0px none rgb(253, 253, 253);
	border-top: 0px none rgb(253, 253, 253);
	border-right: 0px none rgb(253, 253, 253);
	border-bottom: 0px none rgb(253, 253, 253);
	border-left: 0px none rgb(253, 253, 253);
	margin: 0px;
	padding: 0px;
	max-height: none;
	min-height: 0px;
	max-width: none;
	min-width: 0px;

	/* Positioning */
	position: static;
	top: auto;
	bottom: auto;
	right: auto;
	left: auto;
	float: none;
	display: block;
	clear: none;
	z-index: auto;

	/* List */
	list-style-image: none;
	list-style-type: none;
	list-style-position: outside;

	/* Table */
	border-collapse: separate;
	border-spacing: 0px 0px;
	caption-side: top;
	empty-cells: show;
	table-layout: auto;

	/* Miscellaneous */
	overflow: visible;
	cursor: auto;
	visibility: visible;

	/* Effects */
	transform: none;
	transition: all;
	outline: rgb(255, 0, 0) dashed 0.666667px;
	outline-offset: 0px;
	box-sizing: border-box;
	resize: none;
	text-shadow: none;
	text-overflow: clip;
	word-wrap: break-word;
	box-shadow: none;
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

img .bbImage {
	/* Font & Text */
	font-family: "Segoe UI", "Helvetica Neue", Helvetica, Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", sans-serif;
	font-size: 15px;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	letter-spacing: normal;
	line-height: 21px;
	text-decoration: none solid rgb(253, 253, 253);
	text-align: start;
	text-indent: 0px;
	text-transform: none;
	vertical-align: baseline;
	white-space: normal;
	word-spacing: 0px;

	/* Color & Background */
	background-attachment: scroll;
	background-color: rgba(0, 0, 0, 0);
	background-image: none;
	background-position: 0% 0%;
	background-repeat: repeat;
	color: rgb(253, 253, 253);

	/* Box */
	height: 396.729px;
	width: 1082px;
	border: 0px none rgb(253, 253, 253);
	border-top: 0px none rgb(253, 253, 253);
	border-right: 0px none rgb(253, 253, 253);
	border-bottom: 0px none rgb(253, 253, 253);
	border-left: 0px none rgb(253, 253, 253);
	margin: 0px;
	padding: 0px;
	max-height: none;
	min-height: 0px;
	max-width: 100%;
	min-width: 0px;

	/* Positioning */
	position: static;
	top: auto;
	bottom: auto;
	right: auto;
	left: auto;
	float: none;
	display: inline;
	clear: none;
	z-index: auto;

	/* List */
	list-style-image: none;
	list-style-type: none;
	list-style-position: outside;

	/* Table */
	border-collapse: separate;
	border-spacing: 0px 0px;
	caption-side: top;
	empty-cells: show;
	table-layout: auto;

	/* Miscellaneous */
	overflow: clip;
	cursor: pointer;
	visibility: visible;

	/* Effects */
	transform: none;
	transition: all;
	outline: rgb(255, 0, 0) dashed 0.666667px;
	outline-offset: 0px;
	box-sizing: border-box;
	resize: none;
	text-shadow: none;
	text-overflow: clip;
	word-wrap: break-word;
	box-shadow: none;
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

div .message-cell message-cell--main {
	/* Font & Text */
	font-family: "Segoe UI", "Helvetica Neue", Helvetica, Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", sans-serif;
	font-size: 15px;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	letter-spacing: normal;
	line-height: 21px;
	text-decoration: none solid rgb(253, 253, 253);
	text-align: start;
	text-indent: 0px;
	text-transform: none;
	vertical-align: top;
	white-space: normal;
	word-spacing: 0px;

	/* Color & Background */
	background-attachment: scroll;
	background-color: rgba(0, 0, 0, 0);
	background-image: none;
	background-position: 0% 0%;
	background-repeat: repeat;
	color: rgb(253, 253, 253);

	/* Box */
	height: 760.646px;
	width: 1102px;
	border: 0px none rgb(253, 253, 253);
	border-top: 0px none rgb(253, 253, 253);
	border-right: 0px none rgb(253, 253, 253);
	border-bottom: 0px none rgb(253, 253, 253);
	border-left: 0px none rgb(253, 253, 253);
	margin: 0px;
	padding: 10px;
	max-height: none;
	min-height: auto;
	max-width: none;
	min-width: 0px;

	/* Positioning */
	position: static;
	top: auto;
	bottom: auto;
	right: auto;
	left: auto;
	float: none;
	display: block;
	clear: none;
	z-index: auto;

	/* List */
	list-style-image: none;
	list-style-type: none;
	list-style-position: outside;

	/* Table */
	border-collapse: separate;
	border-spacing: 0px 0px;
	caption-side: top;
	empty-cells: show;
	table-layout: auto;

	/* Miscellaneous */
	overflow: visible;
	cursor: auto;
	visibility: visible;

	/* Effects */
	transform: none;
	transition: all;
	outline: rgb(255, 0, 0) dashed 0.666667px;
	outline-offset: 0px;
	box-sizing: border-box;
	resize: none;
	text-shadow: none;
	text-overflow: clip;
	word-wrap: break-word;
	box-shadow: none;
	border-top-left-radius: 0px;
	border-top-right-radius: 3px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 3px;
}

div .title {
	/* Font & Text */
	font-family: "Segoe UI", "Helvetica Neue", Helvetica, Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", sans-serif;
	font-size: 15px;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	letter-spacing: normal;
	line-height: 21px;
	text-decoration: none solid rgb(253, 253, 253);
	text-align: center;
	text-indent: 0px;
	text-transform: none;
	vertical-align: baseline;
	white-space: normal;
	word-spacing: 0px;

	/* Color & Background */
	background-attachment: scroll;
	background-color: rgba(0, 0, 0, 0);
	background-image: none;
	background-position: 0% 0%;
	background-repeat: repeat;
	color: rgb(253, 253, 253);

	/* Box */
	height: 36.3958px;
	width: 1082px;
	border: 0px none rgb(253, 253, 253);
	border-top: 0px none rgb(253, 253, 253);
	border-right: 0px none rgb(253, 253, 253);
	border-bottom: 0px none rgb(253, 253, 253);
	border-left: 0px none rgb(253, 253, 253);
	margin: 0px;
	padding: 0px;
	max-height: none;
	min-height: 0px;
	max-width: none;
	min-width: 0px;

	/* Positioning */
	position: static;
	top: auto;
	bottom: auto;
	right: auto;
	left: auto;
	float: none;
	display: block;
	clear: none;
	z-index: auto;

	/* List */
	list-style-image: none;
	list-style-type: none;
	list-style-position: outside;

	/* Table */
	border-collapse: separate;
	border-spacing: 0px 0px;
	caption-side: top;
	empty-cells: show;
	table-layout: auto;

	/* Miscellaneous */
	overflow: visible;
	cursor: auto;
	visibility: visible;

	/* Effects */
	transform: none;
	transition: all;
	outline: rgb(255, 0, 0) dashed 0.666667px;
	outline-offset: 0px;
	box-sizing: border-box;
	resize: none;
	text-shadow: none;
	text-overflow: clip;
	word-wrap: break-word;
	box-shadow: none;
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

.b{
    color: black;
}
.text {
    color: black;

}

</style>
<div class = "message-cell">

<div class = "bbWrapper">
    <div class = "title">
        <span style = "font-size: 26px"> 
            <b class = "b" > {{$topic -> title}} </b>
    </span>
</div>
    <div class = "bbImage">
        <img src = "">
    </div>
    
    <br>
    <div class = "text">
    <br>
    Tópico para discussão e divulgação de notícias relacionadas ao novo socket da AMD, e as novas gerações de CPUs lançadas para ele.
    <br>
    A primeira geração de CPUs para o socket AM5 usará a arquitetura Zen 4, e deve ser lançada em Setembro de 2022.

</div>
</div>
</div>
@endif
@endsection
