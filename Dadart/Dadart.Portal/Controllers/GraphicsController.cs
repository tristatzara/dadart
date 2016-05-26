using Dadart.BLL.Manager;
using Dadart.Portal.Models;
using System.Web.Mvc;

namespace Dadart.Portal.Controllers
{
    public class GraphicsController : Controller
    {
        // GET: Graphics
        public ActionResult CaratteriMobili()
        {
            ViewBag.Quote = "\"Ma i veri dadaisti sono contro DADA.\" \nTristan Tzara, Manifesto VII1918";
            var manager = new CatalogManager();
            var viewModel = new IndexViewModel();
            viewModel.ProductList = manager.GetAllCategoryProduct("CaratteriMobili");
            foreach (var product in viewModel.ProductList)
            {
                viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
            }
            return View(viewModel);
        }

        public ActionResult Stampe()
        {
            ViewBag.Quote =
                "\"Dada non è una dottrina da praticare, è una \n dottrina per mentire...\" \nTristan Tzara, Manifesto XV 1918";
            var manager = new CatalogManager();
            var viewModel = new IndexViewModel();
            viewModel.ProductList = manager.GetAllCategoryProduct("Stampe");
            foreach (var product in viewModel.ProductList)
            {
                viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
            }
            return View(viewModel);
        }

        public ActionResult Manifesti()
        {
            ViewBag.Quote =
                "\"Dio può permettersi di non aver successo: anche Dada.\"\n Tristan Tzara, Manifesto XV 1918";
            var manager = new CatalogManager();
            var viewModel = new IndexViewModel();
            viewModel.ProductList = manager.GetAllCategoryProduct("Manifesti");
            foreach (var product in viewModel.ProductList)
            {
                viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
            }
            return View(viewModel);
        }
    }
}