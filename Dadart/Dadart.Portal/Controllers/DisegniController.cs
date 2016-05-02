using System.Web.Mvc;

namespace Dadart.Portal.Controllers
{
    public class DisegniController : Controller
    {
        // GET: Disegni
        public ActionResult Dipinti()
        {
            ViewBag.Quote =
                "\"L'importanza di discernere tra le gradazioni di chiarezza: leccare la penombra e galleggiare nella grande bocca colma di miele e d'escrementi.\" Tristan Tzara, La spontaneità dadaista 1918";
            return View();
        }

        public ActionResult DisegniGrafici()
        {
            ViewBag.Quote =
                "\"Se tutti hanno ragione e se tutte le pillole sono pillole Pink, proviamo a non aver ragione.\" Tristan Tzara, Manifesto Dada 1918";
            return View();
        }

        public ActionResult TecnicaMista()
        {
            ViewBag.Quote =
                "\"Anche l'esperienza è il risultato del caso e delle facoltà individuali.\" Tristan Tzara, Manifesto Dada 1918";
            return View();
        }
    }
}