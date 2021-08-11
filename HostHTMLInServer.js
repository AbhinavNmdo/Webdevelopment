const http = require("http")
const fs = require("fs")
const readfile = fs.readFileSync('StationaryWeb.html')

const server = http.createServer((req, res) => {
    res.writeHead(200, {'Content-type':'text/html'})
    res.end(readfile)
})

server.listen(80, '127.0.0.1', () => {
    console.log("Listning to the 80 server")
})