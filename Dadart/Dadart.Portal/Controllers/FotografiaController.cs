using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Dadart.Portal.Controllers
{
    public class FotografiaController : Controller
    {
        // GET: Fotografia
        public ActionResult Fotografie()
        {
            ViewBag.Quote =
                "\"Da quanto tempo le parole esprimono il contrario di ciò che l'organo che le emette pensa e vuole?\" \n Tristan Tzara, Manifesto IV 1918";
            return View();
        }

        public ActionResult Collage()
        {
            ViewBag.Quote =
                "\"(...) urlo urlo urlo urlo urlo urlo urlo(...) \n E ancora una volta mi trovo veramente simpatico\"\n Tristan Tzara, Manifesto XVI (ultimo) 1918";
            return View();
        }

        public ActionResult Fotomontaggi()
        {
            ViewBag.Quote =
                "\"(...) i critici dicono: Dada fa del lusso, Dada è in fregola.Anche Dio fa del lusso o è in fregola: Chi è che ha ragione: Dio, Dada o la critica?\" \n Tristan Tzara, Manifesto XV 1918";
            return View();
        }
    }
}