# API Documentation

## Daftar Buku

* URL
`/api/books`

* Method
`GET`

* URL Params
    * None

* Success Response
    * JSON Data
        *  `'success' => true`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `200`

* Error Response
    * JSON Data
        *  `'success' => false`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `400`

* Sample Call
    ```javascript
    const http = new XMLHttpRequest();
    http.open("GET", "http://127.0.0.1:8000/api/books")
    http.send()
    http.onload = () => console.log(http.responseText)
    ```

## Detail Buku

* URL
`/api/books/details`

* Method
`GET`

* URL Params
    * None

* Success Response
    * JSON Data
        *  `'success' => true`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `200`

* Error Response
    * JSON Data
        *  `'success' => false`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `400`

* Sample Call
    ```javascript
    const http = new XMLHttpRequest();
    http.open("GET", "http://127.0.0.1:8000/api/books/details")
    http.send()
    http.onload = () => console.log(http.responseText)
    ```

## Detail Buku

* URL
`/api/books/details/{id}`

* Method
`GET`

* URL Params
    * None

* Success Response
    * JSON Data
        *  `'success' => true`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `200`

* Error Response
    * JSON Data
        *  `'success' => false`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `400`  

* Sample Call
    ```javascript
    const http = new XMLHttpRequest();
    http.open("GET", "http://127.0.0.1:8000/api/books/details/1")
    http.send()
    http.onload = () => console.log(http.responseText)
    ```


## Pencarian Buku berdasarkan Judul
* URL
`/books/search/`

* Method
`GET`

* URL Params
    * Required
    `query: [string]`

* Success Response
    * JSON Data
        *  `'success' => true`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `200`

* Error Response
    * JSON Data
        *  `'success' => false`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `400`

* Sample Call
    ```javascript
    const http = new XMLHttpRequest();
    http.open("GET", "http://127.0.0.1:8000/api/books/search?query=Harr")
    http.send()
    http.onload = () => console.log(http.responseText)
    ```

## Filter Buku berdasarkan Penulis

* URL
    `/api/books/filter`

* Method
    `GET`

* URL Params
    * Optional
        *`first_name: [string]`
        *`last_name: [string]`

* Success Response
    * JSON Data
        *  `'success' => true`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `200`

* Error Response
    * JSON Data
        *  `'success' => false`
        *  `'message' => $message`
        *  `'data' => $data`
    * HTTP Status Code: `400`

* Sample Call
    ```javascript
    const http = new XMLHttpRequest();
    http.open("GET", "http://127.0.0.1:8000/api/books/filter?first_name=Dan&last_name=Brown")
    http.send()
    http.onload = () => console.log(http.responseText)
    ```