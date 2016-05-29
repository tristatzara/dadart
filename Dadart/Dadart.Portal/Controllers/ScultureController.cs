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
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var products = manager.GetAllCategoryProduct("Sculture");
            foreach (var product in products)
            {
                var productView = new ProductView()
                {
                    Product = product,
                    Artist = manager.GetArtist(product.ArtistId.ToString())
                };
                viewModel.ProductList.Add(productView);
            }
            return View(viewModel);
        }

        public ActionResult ReadyMade()
        {
            ViewBag.Quote =
                "\"Misurata su scala dell'Eterno, ogni azione è vana...\" Tristan Tzara, La spontaneità dadaista 1918";
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var products = manager.GetAllCategoryProduct("ReadyMade");
            foreach (var product in products)
            {
                var productView = new ProductView()
                {
                    Product = product,
                    Artist = manager.GetArtist(product.ArtistId.ToString())
                };
                viewModel.ProductList.Add(productView);
            }
            return View(viewModel);
        }
    }
}