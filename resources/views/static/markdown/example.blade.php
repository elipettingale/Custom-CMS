
@component('mail::message', ['subcopy' => 'Subcopy'])

@component('mail::panel')
Panel
@endcomponent

@component('mail::promotion')
Promotion
@endcomponent

@component('mail::button', ['url' => 'http://www.google.com'])
Button
@endcomponent

@component('mail::table')
|  Test  |  Test  |  Test  |
|  ----  |  ----  |  ----  |
|  Item  |  Item  |  Item  |
@endcomponent

---

# H1
## H2
### H3
#### H4
##### H5
###### H6

Standard Text

```
Codeblock
```

*Emphasis*

1. List Item
2. List Item

> Blockquote

@endcomponent
