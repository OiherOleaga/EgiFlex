import { defineStore } from 'pinia'
import router from '@/router'

export const useMethods = defineStore('methods', () => {

  function route(uri) {
    return `http://localhost/api${uri}`
  }

  async function POST(uri, json) {

    if (typeof json !== "string") {
      json = JSON.stringify(json);
    }

    try {
      res = await fetch(route(uri), {
        method: "POST",
        credentials: "include",
        headers: {
          "Content-type": "application/json"
        },
        body: json
      })

      if (res.headers.get("Content-Type") != 'application/json') {
        document.querySelector("html").innerHTML = await res.text()
        return false;
      }

      json = await res.json();

      if (uri != "/login" && uri != "/resgistro" && !json.logged) {
        router.push("/login");
      }

      return json;
    } catch (error) {
      console.log("Error en " + uri + " POST");
      console.log(error)
    }
  }

  async function GET(uri) {
    try {
      let res = await fetch(route(uri), {
        method: "GET",
        credentials: "include",
      })

      if (res.headers.get("Content-Type") != 'application/json') {
        console.log(await res.text());
        return false;
      }

      let json = await res.json();

      if (!json.logged) {
        router.push("/login");
      }

      return json;
    } catch (error) {
      console.log("Error en " + uri + " GET");
      console.log(error)
    }
  }  

  return { route, POST, GET }
})
