<h1>{$body.title|escape}</h1>
<p><small>Created: {$body.created|date_format:"%Y/%m/%d %H:%m"}</small></p>
<p>{$body.body|escape|nl2br}</p>
