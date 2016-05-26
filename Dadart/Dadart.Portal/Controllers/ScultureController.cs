using Dadart.BLL.Manager;
using Dadart.Portal.Models;
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
            var manager = new CatalogManager();
            var viewModel = new IndexViewModel();
            viewModel.ProductList = manager.GetAllCategoryProduct("Sculture");
            foreach (var product in viewModel.ProductList)
            {
                viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
            }
            return View(viewModel);
        }

        public ActionResult ReadyMade()
        {
            ViewBag.Quote =
                "\"Misurata su scala dell'Eterno, ogni azione è vana...\" Tristan Tzara, La spontaneità dadaista 1918";
            var manager = new CatalogManager();
            var viewModel = new IndexViewModel();
            viewModel.ProductList = manager.GetAllCategoryProduct("ReadyMade");
            foreach (var product in viewModel.ProductList)
            {
                viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
            }
            return View(viewModel);
        }
    }
}