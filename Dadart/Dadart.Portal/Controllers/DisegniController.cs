using System.Collections.Generic;
using Dadart.BLL.Manager;
using Dadart.Portal.Models;
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
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var products = manager.GetAllCategoryProduct("Dipinti");
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

        public ActionResult DisegniGrafici()
        {
            ViewBag.Quote =
                "\"Se tutti hanno ragione e se tutte le pillole sono pillole Pink, proviamo a non aver ragione.\" Tristan Tzara, Manifesto Dada 1918";
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var products = manager.GetAllCategoryProduct("DisegniGrafici");
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

        public ActionResult TecnicaMista()
        {
            ViewBag.Quote =
                "\"Anche l'esperienza è il risultato del caso e delle facoltà individuali.\" Tristan Tzara, Manifesto Dada 1918";
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var products = manager.GetAllCategoryProduct("TecnicaMista");
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