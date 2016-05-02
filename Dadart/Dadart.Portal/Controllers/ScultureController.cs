using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Dadart.Portal.Controllers
{
    public class ScultureController : Controller
    {
        // GET: Sculture
        public ActionResult Sculture()
        {
            ViewBag.Quote =
                "\"Abbiamo rudemente trattato la nostra inclinazione alle lacrime.\" Tristan Tzara, La spontaneità dadaista 1918";
            return View();
        }

        public ActionResult ReadyMade()
        {
            ViewBag.Quote =
                "\"Misurata su scala dell'Eterno, ogni azione è vana...\" Tristan Tzara, La spontaneità dadaista 1918";
            return View();
        }
    }
}