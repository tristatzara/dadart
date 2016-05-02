using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Dadart.Portal.Controllers
{
    public class GraphicsController : Controller
    {
        // GET: Graphics
        public ActionResult CaratteriMobili()
        {
            ViewBag.Quote = "\"Ma i veri dadaisti sono contro DADA.\" \nTristan Tzara, Manifesto VII1918";
            return View();
        }

        public ActionResult Stampe()
        {
            ViewBag.Quote =
                "\"Dada non è una dottrina da praticare, è una \n dottrina per mentire...\" \nTristan Tzara, Manifesto XV 1918";
            return View();
        }

        public ActionResult Manifesti()
        {
            ViewBag.Quote =
                "\"Dio può permettersi di non aver successo: anche Dada.\"\n Tristan Tzara, Manifesto XV 1918";
            return View();
        }
    }
}